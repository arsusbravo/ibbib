<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Helpers\AppHelper;

class CountryController extends Controller
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
        $countries = Country::where(function($query) use ($request){
            if($request->query('search')){
                $search = $request->query('search');
                $query->where(function($q) use ($search){
                    $q->orWhere('country_name', 'LIKE', '%'.$search.'%');
                    $q->orWhere('country_code', '%'.$search.'%');
                });
            }
            $query->orderBy('country_name');
        });
        $count = $countries->count();
        $countries = $countries->paginate(10);
        
        $country = null;
        if($id){
            $country = Country::find($id);
        }
        
        return view('admin.countries', [
            'id' => $id,
            'count' => $count,
            'country' => $country,
            'countries' => $countries,
            'apphelper' => new AppHelper,
        ]);
    }

    public function update(Request $request, $id){
        $helper = new AppHelper;
        $input = $request->all();
        $updateValidation = [
            'country_name' => 'required|max:255',
            'country_code' => 'required|max:2'
        ];
        $invalid = $helper->isInvalid($input, $updateValidation);
        if($invalid){
            return redirect()
                ->back()
                ->withErrors($invalid)
                ->withInput();
        }

        if(isset($input['thumbnails'])){
            $helper->resizeSquare($input['thumbnails'], 24, public_path('themes/frontpage/images/flags/sm/'.strtoupper($input['country_code']).'.png'));
            $helper->resizeSquare($input['thumbnails'], 48, public_path('themes/frontpage/images/flags/md/'.strtoupper($input['country_code']).'.png'));
        }
        
        $update = Country::find($id);
        $update->country_name = $input['country_name'];
        $update->country_code = strtoupper(trim($input['country_code']));

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
            'country_name' => 'required|unique:countries|max:255',
            'country_code' => 'required|unique:countries|max:2',
            'thumbnails' => 'required'
        ];
        $invalid = $helper->isInvalid($input, $addValidation);
        if($invalid){
            return redirect()
                ->back()
                ->withErrors($invalid)
                ->withInput();
        }

        $helper->resizeSquare($input['thumbnails'], 24, public_path('themes/frontpage/images/flags/sm/'.strtoupper($input['country_code']).'.png'));
        $helper->resizeSquare($input['thumbnails'], 48, public_path('themes/frontpage/images/flags/md/'.strtoupper($input['country_code']).'.png'));
        
        $add = new Country;
        $add->country_name = $input['country_name'];
        $add->country_code = strtoupper(trim($input['country_code']));

        if($add->save()){
            return redirect()->back()->with('success_msg', 'New record added successful');
        }else{
            return redirect()->back()->with('error_msg', 'New record failed');
        }
    }
}
