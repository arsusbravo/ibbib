<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Language;
use App\Helpers\AppHelper;

class SkillController extends Controller
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
    public function index($id=0){
        $skills = Skill::paginate(10);
        $languages = Language::whereActive(1)->get();
        $skill = null;
        if($id){
            $skill = Skill::find($id);
        }
        
        return view('admin.skills', [
            'id' => $id,
            'skill' => $skill,
            'skills' => $skills,
            'languages' => $languages,
            'apphelper' => new AppHelper,
        ]);
    }
}
