<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Helpers\AppHelper;

class CategoryController extends Controller
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
        $categories = Category::where(function($query) use ($request){
            if($request->query('search')){
                $search = $request->query('search');
                $query->where(function($q) use ($search){
                    $q->orWhere('name', 'LIKE', '%'.$search.'%');
                    $q->orWhere('description', '%'.$search.'%');
                });
            }
            $query->orderBy('name');
        });
        $count = $categories->count();
        $categories = $categories->paginate(10);

        $category = null;
        if($id){
            $category = Category::find($id);
        }
        
        return view('admin.categories', [
            'id' => $id,
            'count' => $count,
            'category' => $category,
            'categories' => $categories,
            'apphelper' => new AppHelper,
        ]);
    }
}
