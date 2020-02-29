<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Language;
use App\Helpers\AppHelper;

class LanguageController extends Controller
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
        $languages = Language::orderBy('active', 'desc')->orderBy('name')->paginate(10);
        $countries = Country::all();
        $language = null;
        if($id){
            $language = Language::find($id);
        }
        
        return view('admin.languages', [
            'id' => $id,
            'language' => $language,
            'languages' => $languages,
            'countries' => $countries,
            'apphelper' => new AppHelper,
        ]);
    }
}
