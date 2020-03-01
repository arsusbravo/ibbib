<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Price;
use App\Helpers\AppHelper;

class PriceController extends Controller
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
        $prices = Price::where(function($query) use ($request){
            if($request->query('search')){
                $search = $request->query('search');
                $query->where(function($q) use ($search){
                    $q->orWhere('title', 'LIKE', '%'.$search.'%');
                    $q->orWhere('description', '%'.$search.'%');
                    $q->orWhere('code', '%'.$search.'%');
                });
            }
            $query->orderBy('role_id');
        });
        $count = $prices->count();
        $prices = $prices->paginate(10);

        $roles = Role::all();
        $price = null;
        if($id){
            $price = Price::find($id);
        }
        
        return view('admin.prices', [
            'id' => $id,
            'count' => $count,
            'roles' => $roles,
            'price' => $price,
            'prices' => $prices,
            'apphelper' => new AppHelper,
        ]);
    }
}
