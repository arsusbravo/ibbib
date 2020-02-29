<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Helpers\AppHelper;

class RoleController extends Controller
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
        $roles = Role::paginate(10);
        $role = null;
        if($id){
            $role = Role::find($id);
        }
        
        return view('admin.roles', [
            'id' => $id,
            'role' => $role,
            'roles' => $roles,
            'apphelper' => new AppHelper,
        ]);
    }
}
