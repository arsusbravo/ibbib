<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LanguageSkill;
use App\Models\Language;
use App\Models\Project;

class CustomerController extends Controller
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

    public function index()
    {
        $user = \Auth::user();
        if(is_null($user->client)){
            return redirect('client/account')->with('info_msg', __('You have not updated your account'));
        }else{
            $languages = \App\Models\Language::orderBy('active', 'desc')->get();
            return view('client.post', [
                'user' => $user,
                'languages' => $languages,
            ]);
        }
        
    }

    public function account(){
        $user = \Auth::user();
        $projects = $user->client ? $user->client->projects: null;
        return view('client.settings', [
            'user' => $user,
            'projects' => $projects,
        ]);
    }

    public function project($id){
        $user = \Auth::user();
        $project = Project::find($id);
        if(!$project){
            return redirect('client/account')->with('error_msg', __('No such project'));
        }
        if($project->customer_id != \Auth::user()->client->id){
            return redirect('client/account')->with('error_msg', __('You have no access to this project'));
        }
        return view('client.project', [
            'user' => $user,
            'project' => $project,
        ]);
    }

    public function projectStore(Request $request){
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
        $project->client_id = \Auth::id();
        $project->deleted = null;
        $project->deadline = \Carbon\Carbon::parse($input['deadline']);
        $project->published = 1;
        $project->published_at = \Carbon\Carbon::today();

        $skill = LanguageSkill::where('from', $input['from'])->where('to', $input['to'])->first();
        if(!$skill){
            $inactive_from_language = Language::whereId($input['from'])->whereNull('active')->pluck('id')->toArray();
            $inactive_to_language = Language::whereId($input['to'])->whereNull('active')->pluck('id')->toArray();
            $inactive_languages = array_merge($unexisted_from_language, $unexisted_to_language);
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
}
