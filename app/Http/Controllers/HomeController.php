<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $meta = null;
        return view('home', [
            'meta' => $meta,
            /* 'content' => $content, */
        ]);
    }

    public function about(){
        $content = Content::where('slug', 'about')->first();
        if($content){
            $meta['title'] = $content->title;
            $meta['description'] = $content->description;
            $meta['keywords'] = $content->keywords;
        }else{
            $meta = null;
        }

        return view('pages.about', [
            'meta' => $meta,
            'content' => $content,
        ]);
    }

    public function translator(){
        $content = Content::where('slug', 'translator')->first();
        if($content){
            $meta['title'] = $content->title;
            $meta['description'] = $content->description;
            $meta['keywords'] = $content->keywords;
        }else{
            $meta = null;
        }

        return view('pages.translator', [
            'meta' => $meta,
            'content' => $content,
        ]);
    }

    public function agency(){
        $content = Content::where('slug', 'agency')->first();
        if($content){
            $meta['title'] = $content->title;
            $meta['description'] = $content->description;
            $meta['keywords'] = $content->keywords;
        }else{
            $meta = null;
        }

        return view('pages.agency', [
            'meta' => $meta,
            'content' => $content,
        ]);
    }

    public function contact(){
        $content = Content::where('slug', 'contact')->first();
        if($content){
            $meta['title'] = $content->title;
            $meta['description'] = $content->description;
            $meta['keywords'] = $content->keywords;
        }else{
            $meta = null;
        }

        return view('pages.contact', [
            'meta' => $meta,
            'content' => $content,
        ]);
    }
}
