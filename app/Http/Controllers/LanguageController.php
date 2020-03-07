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

    public function update(Request $request, $id){
        $helper = new AppHelper;
        $input = $request->all();
        $updateValidation = [
            'name' => 'required|max:255',
            'code' => 'required|max:2'
        ];
        $invalid = $helper->isInvalid($input, $updateValidation);
        if($invalid){
            return redirect()
                ->back()
                ->withErrors($invalid)
                ->withInput();
        }

        $update = Language::find($id);
        $update->name = $input['name'];
        $update->code = strtoupper(trim($input['code']));
        $update->original = strtoupper(trim($input['original']));
        $update->country_id = $input['country_id'];
        $update->active = isset($input['active']) ? $input['active']: null;

        if($update->save()){
            return redirect()->back()->with('success_msg', 'Update successful');
        }else{
            return redirect()->back()->with('error_msg', 'Update failed');
        }
    }

    public function store(Request $request){
        $helper = new AppHelper;
        $input = $request->all();
        $addValidation = [
            'name' => 'required|max:255',
            'code' => 'required|max:2'
        ];
        $invalid = $helper->isInvalid($input, $addValidation);
        if($invalid){
            return redirect()
                ->back()
                ->withErrors($invalid)
                ->withInput();
        }

        $add = new Language;
        $add->name = $input['name'];
        $add->code = strtoupper(trim($input['code']));
        $add->original = strtoupper(trim($input['original']));
        $add->country_id = $input['country_id'];
        if(isset($input['active'])){
            $add->active =  $input['active'];
        }
        
        if($add->save()){
            return redirect()->back()->with('success_msg', 'New record added successful');
        }else{
            return redirect()->back()->with('error_msg', 'New record failed');
        }
    }
}
