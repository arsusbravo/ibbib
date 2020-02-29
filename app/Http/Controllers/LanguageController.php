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
    public function index(Request $request, $id=0){
        $languages = Language::where(function($query) use ($request){
            if($request->query('search')){
                $search = $request->query('search');
                $query->where(function($q) use ($search){
                    $q->orWhere('name', 'LIKE', '%'.$search.'%');
                    $q->orWhere('original', '%'.$search.'%');
                    $q->orWhere('code', '%'.$search.'%');
                });
            }
            $query->orderBy('active', 'desc');
            $query->orderBy('name');
        });
        $count = $languages->count();
        $languages = $languages->paginate(10);

        $countries = Country::all();
        $language = null;
        if($id){
            $language = Language::find($id);
        }
        
        return view('admin.languages', [
            'id' => $id,
            'count' => $count,
            'language' => $language,
            'languages' => $languages,
            'countries' => $countries,
            'apphelper' => new AppHelper,
        ]);
    }
}
