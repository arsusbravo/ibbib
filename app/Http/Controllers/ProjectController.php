<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Helpers\AppHelper;
use App\Models\LanguageSkill;
use App\Models\Skill;
use App\Models\Language;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blade = 'front.projects';
        if(\Auth::check()){
            $user = \Auth::user();
            $hasResume = !$user->crew->resume ? false: true;
            if($user->role->slug == 'crew'){
                $blade = 'user.jobs';
            }
        }else{
            $user = null;
            $hasResume = true;
        }
        $user = \Auth::user();
        $hasResume = !$user->crew->resume ? false: true;
        $projects = Project::where('published', 1)->whereNull('deleted')->where('deadline', '>', \Carbon\Carbon::today())->get();
        
        return view($blade, [
            'user' => $user,
            'projects' => $projects,
            'hasResume' => $hasResume,
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

        switch($user->role->slug){
            case "customer":
                $blade = 'client.project';
            break;
            case "crew":
                $blade = 'client.project';
            break;
            default:
                $blade = 'front.project';
            break;
        }

        return view($blade, [
            'user' => $user,
            'project' => $project,
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
}