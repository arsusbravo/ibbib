<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('user.jobs', [
            'user' => $user,
            'hasResume' => $hasResume,
        ]);
        
    }

    public function account(){
        $user = \Auth::user();
        $languages = \App\Models\Language::whereActive(1)->get();
        return view('user.settings', [
            'user' => $user,
            'languages' => $languages,
        ]);
    }
}
