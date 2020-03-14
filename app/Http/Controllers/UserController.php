<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Country;
use App\Helpers\AppHelper;

class UserController extends Controller
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
    public function index(Request $request, $slug=null){
        $users = User::with('role')->where(function($query) use ($request, $slug){
            if(!is_null($slug)){
                $query->orWhereHas('role', function($q) use ($slug) {
                    if($slug != 'admin'){
                        $q->where('slug', $slug);
                    }else{
                        $q->whereIn('slug', ['master', 'admin', 'worker']);
                    }
                    
                });
            }
            if($request->query('search')){
                $search = $request->query('search');
                $query->where(function($q) use ($search){
                    $q->orWhere('name', 'LIKE', '%'.$search.'%');
                    $q->orWhere('email', 'LIKE', '%'.$search.'%');
                });
            }
        });
        $count = $users->count();
        $users = $users->paginate(10);
        $roles = Role::whereNotIn('slug', ['crew', 'customer'])->get();
        switch($slug){
            case "crew":
                $title = "Translator";
            break;
            case "customer":
                $title = "Agency";
            break;
            default:
                $title = "Admin";
            break;
        }
        
        return view('admin.users', [
            'slug' => $slug,
            'roles' => $roles,
            'count' => $count,
            'users' => $users,
            'title' => $title,
            'apphelper' => new AppHelper,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id){
        $user = User::find($id);
        $roles = Role::all();
        $countries = Country::all();
        if(in_array($user->role->slug, ['master', 'admin', 'worker'])){
            $slug = 'admin';
        }else{
            $slug = $user->role->slug;
        }
        
        return view('admin.user', [
            'user' => $user,
            'slug' => $slug,
            'roles' => $roles,
            'countries' => $countries,
            'apphelper' => new AppHelper,
        ]);
    }

    public function store(Request $request){
        $helper = new AppHelper;
        $input = $request->all();
        $addValidation = [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'confirm_password' => 'same:password',
        ];
        $invalid = $helper->isInvalid($input, $addValidation);
        if($invalid){
            return redirect()
                ->back()
                ->withErrors($invalid)
                ->withInput();
        }
        
        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->active = isset($input['active']) && $input['active'] == 'on' ? 1: null;

        if(isset($input['role_id'])){
            $role_id = $input['role_id'];
        }else{
            $role_id = $input['role'];
        }
        $user->role_id = $role_id;

        if($input['password']){
            $user->password = \Hash::make(trim($input['password']));
        }else{
            $user->password = \Hash::make(\Str::random(6));
        }

        if($user->save()){
            return redirect()->back()->with('success_msg', 'User is saved');
        }else{
            return redirect()->back()->with('error_msg', 'User is NOT saved');
        }
    }

    public function update(Request $request, $id){
        $helper = new AppHelper;
        $input = $request->all();
        $addValidation = [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'confirm_password' => 'same:password',
        ];
        $invalid = $helper->isInvalid($input, $addValidation);
        if($invalid){
            return redirect()
                ->back()
                ->withErrors($invalid)
                ->withInput();
        }
        
        $user = User::find($id);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->active = isset($input['active']) && $input['active'] == 'on' ? 1: null;

        if(isset($input['role_id'])){
            $role_id = $input['role_id'];
        }else{
            $role_id = $input['role'];
        }
        $user->role_id = $role_id;

        if($input['password']){
            $user->password = \Hash::make(trim($input['password']));
        }

        if($user->save()){
            return redirect()->back()->with('success_msg', $input['name']. ' is updated');
        }else{
            return redirect()->back()->with('error_msg', $input['name']. ' is NOT updated');
        }
    }
}
