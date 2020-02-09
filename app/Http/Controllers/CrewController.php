<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class CrewController extends Controller
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
        $hasResume = !$user->crew->resume ? false: true;
        $projects = Project::where('published', 1)->whereNull('deleted')->where('deadline', '>', \Carbon\Carbon::today())->get();
        return view('user.jobs', [
            'user' => $user,
            'projects' => $projects,
            'hasResume' => $hasResume,
        ]);
        
    }

    public function account(){
        $user = \Auth::user();
        $languages = \App\Models\Language::whereActive(1)->get();
        $countries = \App\Models\Country::all();
        return view('user.settings', [
            'user' => $user,
            'countries' => $countries,
            'languages' => $languages,
        ]);
    }

    public function project($id){
        $project = Project::find($id);
        $today = \Carbon\Carbon::today();
        if($project->deleted){
            return redirect()->back()->with('error_msg', __('This project has been removed'));
        }
        if(!$project->published){
            return redirect()->back()->with('error_msg', __('This project is not for public'));
        }
        if($today->gt(\Carbon\Carbon::parse($project->deadline))){
            return redirect()->back()->with('error_msg', __('This project has met the deadline'));
        }
        return view('user.job-details', [
            'project' => $project,
        ]);
    }
}
