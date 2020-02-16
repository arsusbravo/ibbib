<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /* protected function redirectTo()
    {
        if (auth()->user()->role->slug == 'admin' || 
            auth()->user()->role->slug == 'master' || 
            auth()->user()->role->slug == 'worker') {
            return '/admin';
        }
        if (auth()->user()->role->slug == 'crew') {
            return '/user';
        }
        if (auth()->user()->role->slug == 'customer') {
            return '/client';
        }
        return '/';
    } */

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        /* Send activation email here! */

        return redirect($this->redirectPath())->with('info_msg', __('Please activate your account by clicking on the link in the activation e-mail we have just sent.'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $role = \App\Models\Role::where('slug', $data['role'])->first();
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $role->id,
            'password' => Hash::make($data['password']),
        ]);
    }
}
