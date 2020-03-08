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
                    $q->orWhere('description', 'LIKE', '%'.$search.'%');
                    $q->orWhere('keywords', 'LIKE', '%'.$search.'%');
                    $q->orWhere('body', 'LIKE', '%'.$search.'%');
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

    public function store(Request $request){
        $helper = new AppHelper;
        $input = $request->all();
        $addValidation = [
            'title' => 'required|max:255',
            'description' => 'required|max:165',
            'body' => 'required',
        ];
        $invalid = $helper->isInvalid($input, $addValidation);
        if($invalid){
            return redirect()
                ->back()
                ->withErrors($invalid)
                ->withInput();
        }

        $add = new Content;
        $add->title = $input['title'];
        $add->slug = !$input['slug'] ? \Str::slug($input['title']): $input['slug'];
        $add->description = $input['description'];
        $add->keywords = $input['keywords'];
        $add->language_id = $input['language_id'];
        $add->body = $input['body'];
        
        if($add->save()){
            return redirect()->back()->with('success_msg', 'New record added successful');
        }else{
            return redirect()->back()->with('error_msg', 'New record failed');
        }
    }

    public function update(Request $request, $id){
        $helper = new AppHelper;
        $input = $request->all();
        $addValidation = [
            'title' => 'required|max:255',
            'description' => 'required|max:165',
            'body' => 'required',
        ];
        $invalid = $helper->isInvalid($input, $addValidation);
        if($invalid){
            return redirect()
                ->back()
                ->withErrors($invalid)
                ->withInput();
        }

        $update = Content::find($id);
        $update->title = $input['title'];
        $update->slug = !$input['slug'] ? \Str::slug($input['title']): $input['slug'];
        $update->description = $input['description'];
        $update->keywords = $input['keywords'];
        $update->language_id = $input['language_id'];
        $update->body = $input['body'];
        
        if($update->save()){
            return redirect()->back()->with('success_msg', 'Update successful');
        }else{
            return redirect()->back()->with('error_msg', 'Update failed');
        }
    }
}
