<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

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
    public function index($id=0){
        $countries = Country::orderBy('country_name')->paginate(25);
        $country = null;
        if($id){
            $country = Country::find($id);
        }
        
        return view('admin.countries', [
            'id' => $id,
            'country' => $country,
            'countries' => $countries,
        ]);
    }
}
