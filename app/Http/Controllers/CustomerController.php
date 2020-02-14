<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\LanguageSkill;
use App\Models\Language;
use App\Models\Project;
use App\Models\Crew;

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
        $projects = $user->client ? $user->client->projects: null;
        return view('client.settings', [
            'user' => $user,
            'projects' => $projects,
        ]);
    }

    /**
     * Translator list.
     *
     * @return list
     */
    public function read(Request $request){
        $user = \Auth::user();
        $translators = Crew::with('User')->where(function($query) use ($request){
            $query->whereNotNull('resume')->orderBy('recommended', 'desc')->orderBy('created_at', 'desc');
            
            if($request->query('country')){
                $query->where('country_id', $request->query('country'));
            }
            if($request->query('skills')>0){
                $lang_skill = LanguageSkill::find($request->query('skills'));
                $skills = $lang_skill->skill->crews->pluck('id')->toArray();
                if(count($skills)){
                    $query->whereIn('id', $skills);
                }else{
                    $query->where('id', 99999);
                }
            }
            $search = $request->query('search');
            if($search){
                $query->where(function($q) use ($search){
                    $q->orWhere('resume', '%'.$search.'%');
                    $q->orWhere('co_name', 'LIKE', '%'.$search.'%');
                    $q->orWhere('additional_info', 'LIKE', '%'.$search.'%');
                });
            }
            $query->orWhereHas('User', function($q) use ($search) {
                $q->where(function($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
            });
        })->paginate(20);
        $translationskills = LanguageSkill::all();
        
        return view('client.user_list', [
            'user' => $user,
            'translators' => $translators,
            'translationskills' => $translationskills,
        ]);
    }

    /**
     * Translator detail.
     *
     * @return translator
     */
    public function show(Request $request, $id){
        $user = \Auth::user();
        $translator = Crew::find($id);
        
        return view('client.user', [
            'user' => $user,
            'translator' => $translator,
        ]);
    }
}
