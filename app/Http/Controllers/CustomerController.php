<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
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

    public function index()
    {
        $user = \Auth::user();
        if(is_null($user->client)){
            return redirect('client/account')->with('info_msg', __('You have not updated your account'));
        }else{
            return view('client.post');
        }
        
    }

    public function account(){
        $user = \Auth::user();
        $projects = $user->client ? $user->client->projects: null;
        return view('client.settings', [
            'user' => $user,
            'projects' => $projects,
        ]);
    }
}
