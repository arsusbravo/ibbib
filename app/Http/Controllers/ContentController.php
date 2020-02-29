<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Language;
use App\Helpers\AppHelper;

class ContentController extends Controller
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
        $contents = Content::where(function($query) use ($request){
            if($request->query('search')){
                $search = $request->query('search');
                $query->where(function($q) use ($search){
                    $q->orWhere('title', 'LIKE', '%'.$search.'%');
                    $q->orWhere('description', '%'.$search.'%');
                    $q->orWhere('keywords', '%'.$search.'%');
                    $q->orWhere('body', '%'.$search.'%');
                });
            }
            $query->orderBy('id');
        });
        $count = $contents->count();
        $contents = $contents->paginate(10);
        $languages = Language::whereActive(1)->get();
        $content = null;
        if($id){
            $content = Content::find($id);
        }
        
        return view('admin.contents', [
            'id' => $id,
            'count' => $count,
            'content' => $content,
            'contents' => $contents,
            'languages' => $languages,
            'apphelper' => new AppHelper,
        ]);
    }
}
