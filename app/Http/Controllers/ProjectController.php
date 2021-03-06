<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Helpers\AppHelper;
use App\Models\LanguageSkill;
use App\Models\Skill;
use App\Models\Language;
use App\Models\Customer;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blade = 'front.projects';
        $apphelper = new AppHelper;
        $from = $request->query('from');
        $to = $request->query('to');
        
        if($from && $from == $to){
            return redirect()->back()->with('error_msg', __('You cannot translate from the same language'));
        }
        if(\Auth::check()){
            $user = \Auth::user();
            $hasResume = !$user->crew || $user->crew && !$user->crew->resume ? false: true;
            if($user->role->slug == 'crew'){
                $blade = 'user.jobs';
            }elseif($user->role->slug == 'customer'){
                $blade = 'front.projects';
            }else{
                $blade = 'admin.projects';
            }
        }else{
            $user = null;
            $hasResume = true;
        }

        $projects = Project::with('client')->with('skill')->where(function($query) use ($request, $from, $to){
            $query->where('published', 1)->whereNull('deleted')->where('published_at', '<', \Carbon\Carbon::now())->where('deadline', '>', \Carbon\Carbon::today());

            if(\Auth::check() && \Auth::user()->role->slug == 'crew' && \Auth::user()->crew->certificates->count()){
                /* $userskills = \Auth::user()->crew->skills()->pluck('skill_id')->toArray(); */
                $userskills=[];
                foreach(\Auth::user()->crew->certificates as $cert){
                    $skill = LanguageSkill::where('from', $cert->language_from)->where('to', $cert->language_to)->first();
                    if($skill){
                        $userskills[] = $skill->skill->id;
                    }
                }
                if(count($userskills)){
                    $query->whereIn('skill_id', $userskills);
                }
                
            }
            
            $search = $request->query('search');
            if($search){
                $query->where(function($q) use ($search){
                    $q->orWhere('title', '%'.$search.'%');
                    $q->orWhere('content', 'LIKE', '%'.$search.'%');
                });
            }
            $query->orWhereHas('client', function($q) use ($search) {
                $q->where(function($q) use ($search) {
                    $q->where('co_name', 'LIKE', '%' . $search . '%');
                    $q->where('info', 'LIKE', '%' . $search . '%');
                });
            });

            if($request->query('orderby')){
                $orderby = $request->query('orderby');
            }else{
                $orderby = 'published_at';
            }
            $query->orderBy($orderby, 'desc');
        });
        $count_projects = $projects->count();
        $projects = $projects->paginate(20);
        $languages = Language::whereActive(1)->get();
        $from = $to = null;
        if($request->query('from')){
            $fromlang = Language::find($request->query('from'));
            $from = $fromlang->name;
        }
        if($request->query('to')){
            $tolang = Language::find($request->query('to'));
            $to = $tolang->name;
        }
        $params = $request->query();
        $orderbies = [
            'published_at' => 'Publish date', 
            'deadline' => 'Deadline', 
        ];
        
        return view($blade, [
            'to' => $to,
            'from' => $from,
            'user' => $user,
            'params' => $params,
            'projects' => $projects,
            'languages' => $languages,
            'apphelper' => $apphelper,
            'hasResume' => $hasResume,
            'orderbies' => $orderbies,
            'count_projects' => $count_projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AppHelper $helper)
    {
        if(!$helper->hasAccess(['customer', 'admin', 'master'])){
            return redirect()->back()->with('error_msg', __('You have no access'));
        }
        $user = \Auth::user();
        if(is_null($user->client)){
            return redirect('client/account')->with('info_msg', __('You have not updated your account'));
        }else{
            $languages = \App\Models\Language::orderBy('active', 'desc')->get();
            $categories = \App\Models\Category::all();
            return view('client.post', [
                'user' => $user,
                'languages' => $languages,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppHelper $helper)
    {
        if(!$helper->hasAccess(['customer', 'admin', 'master'])){
            return redirect()->back()->with('error_msg', __('You have no access'));
        }
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'title' => 'required|max:255',
            'from' => 'required|numeric|min:1',
            'to' => 'required|numeric|min:1',
            'content' => 'required',
            'accord' => 'required|digits:1',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $project = new Project;
        $project->title = $input['title'];
        $project->slug = \Str::slug($input['title']);
        $project->content = $input['content'];
        $project->customer_id = \Auth::id();
        $project->deleted = null;
        $project->deadline = \Carbon\Carbon::parse($input['deadline']);
        $project->published = 1;
        $project->published_at = \Carbon\Carbon::today();
        if(count($input['categories'])){
            $project->categories->attach($input['categories']);
        }

        $skill = LanguageSkill::where('from', $input['from'])->where('to', $input['to'])->first();
        if(!$skill){
            $inactive_from_language = Language::whereId($input['from'])->whereNull('active')->pluck('id')->toArray();
            $inactive_to_language = Language::whereId($input['to'])->whereNull('active')->pluck('id')->toArray();
            $inactive_languages = array_merge($inactive_to_language, $inactive_languages);
            if(count($inactive_languages)){
                foreach($inactive_languages as $id){
                    $lang = Language::find($id);
                    $lang->active = 1;
                    $lang->save();
                }
            }

            $newskill = new LanguageSkill;
            $newskill->from = $input['from'];
            $newskill->to = $input['to'];
            if($newskill->save()){
                $addskill = new Skill;
                $addskill->language_skill_id = $newskill->id;
                $addskill->save();
                $skill_id = $addskill->id;
            }
        }else{
            $skill_id = $skill->skill->id;
        }
        $project->skill_id = $skill_id;

        if($project->save()){
            return redirect()->back()->with('success_msg', __('Your new project has been added'));
        }else{
            return redirect()->back()->with('error_msg', __('Oops! Your new project cannot be added!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \Auth::user();
        $project = Project::find($id);
        $today = \Carbon\Carbon::today();
        if(!$project){
            return redirect('client/account')->with('error_msg', __('No such project'));
        }
        if($user->role->slug == 'customer'){
            if($project->customer_id != \Auth::user()->client->id){
                return redirect('client/account')->with('error_msg', __('You have no access to this project'));
            }
        }
        if($project->deleted){
            return redirect()->back()->with('error_msg', __('This project has been removed'));
        }
        if(!$project->published){
            return redirect()->back()->with('error_msg', __('This project is not for public'));
        }
        if($today->gt(\Carbon\Carbon::parse($project->deadline))){
            return redirect()->back()->with('error_msg', __('This project has met the deadline'));
        }
        $bookmarked = false;
        $otherprojects = Project::where('id', '!=', $id);
        switch($user->role->slug){
            case "customer":
                $blade = 'client.project';
                $otherprojects = $otherprojects->where('customer_id', \Auth::id());
            break;
            case "crew":
                $blade = 'user.job-details';
                foreach(\Auth::user()->crew->certificates as $cert){
                    $langskill = LanguageSkill::where('from', $cert->language_from)->where('to', $cert->language_to)->first();
                    $userskills[] = $langskill->skill->id;
                }
                $otherprojects = $otherprojects->whereIn('skill_id', $userskills);
                if($project->bookmarked[0]->pivot->where('crew_id', \Auth::user()->crew->id)->count()){
                    $bookmarked = true;
                }
            break;
            default:
                $blade = 'front.project';
            break;
        }
        $otherprojects = $otherprojects->take(4)->get();

        return view($blade, [
            'user' => $user,
            'project' => $project,
            'bookmarked' => $bookmarked,
            'otherprojects' => $otherprojects,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AppHelper $helper, $id)
    {
        if(!$helper->hasAccess(['customer'])){
            return redirect()->back()->with('error_msg', __('You have no access'));
        }
        $user = \Auth::user();
        if(is_null($user->client)){
            return redirect('client/account')->with('info_msg', __('You have not updated your account'));
        }else{
            $languages = \App\Models\Language::orderBy('active', 'desc')->get();
            $categories = \App\Models\Category::all();
            $project = \App\Models\Project::find($id);
            return view('client.post', [
                'id' => $id,
                'user' => $user,
                'project' => $project,
                'languages' => $languages,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppHelper $helper, Request $request, $id)
    {
        if(!$helper->hasAccess(['customer', 'admin', 'master'])){
            return redirect()->back()->with('error_msg', __('You have no access'));
        }
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'title' => 'required|max:255',
            'from' => 'required|numeric|min:1',
            'to' => 'required|numeric|min:1',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $project = Project::find($id);
        $project->title = $input['title'];
        $project->slug = \Str::slug($input['title']);
        $project->content = $input['content'];
        $project->deadline = \Carbon\Carbon::parse($input['deadline']);
        if(count($input['categories'])){
            $project->categories()->sync($input['categories']);
        }

        $skill = LanguageSkill::where('from', $input['from'])->where('to', $input['to'])->first();
        if(!$skill){
            $inactive_from_language = Language::whereId($input['from'])->whereNull('active')->pluck('id')->toArray();
            $inactive_to_language = Language::whereId($input['to'])->whereNull('active')->pluck('id')->toArray();
            $inactive_languages = array_merge($inactive_from_language, $inactive_to_language);
            if(count($inactive_languages)){
                foreach($inactive_languages as $id){
                    $lang = Language::find($id);
                    $lang->active = 1;
                    $lang->save();
                }
            }

            $newskill = new LanguageSkill;
            $newskill->from = $input['from'];
            $newskill->to = $input['to'];
            if($newskill->save()){
                $addskill = new Skill;
                $addskill->language_skill_id = $newskill->id;
                $addskill->save();
                $skill_id = $addskill->id;
            }
        }else{
            $skill_id = $skill->skill->id;
        }
        $project->skill_id = $skill_id;

        if($project->save()){
            return redirect('client/account')->with('success_msg', __('Your project has been udated'));
        }else{
            return redirect()->back()->with('error_msg', __('Oops! Your new project cannot be updated!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apply($id){
        $user = \Auth::user();
        if($user->crew->credits){
            //
        }else{
            return redirect('user/pricing')->with('info_msg', __('To apply for a project you need to have a credit. Here you can buy some credits.'));
        }
    }

    public function bookmark($id){
        $project = Project::find($id);
        $project->bookmarked()->attach(\Auth::user()->crew->id);
        return redirect()->back()->with('success_msg', __('The project has been bookmarked. You can find it in your account page'));
    }
}
