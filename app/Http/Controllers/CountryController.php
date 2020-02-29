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
}
