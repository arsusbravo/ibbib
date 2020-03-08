<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use App\Helpers\AppHelper;

class DegreeController extends Controller
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
        $degrees = Degree::where(function($query) use ($request){
            if($request->query('search')){
                $search = $request->query('search');
                $query->where(function($q) use ($search){
                    $q->orWhere('title', 'LIKE', '%'.$search.'%');
                    $q->orWhere('description', 'LIKE', '%'.$search.'%');
                });
            }
            $query->orderBy('id');
        });
        $count = $degrees->count();
        $degrees = $degrees->paginate(10);
        $degree = null;
        if($id){
            $degree = Degree::find($id);
        }
        
        return view('admin.degrees', [
            'id' => $id,
            'count' => $count,
            'degree' => $degree,
            'degrees' => $degrees,
            'apphelper' => new AppHelper,
        ]);
    }
}
