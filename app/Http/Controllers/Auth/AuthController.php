<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Mail\Subscribe;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {

        return view('auth.login');
    }

    public function registration() {

        return view('auth.register');
    }

    public function login(LoginRequest $request) {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect('login')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User($request->validated());

        $user->password = Hash::make($user->password);

        $userRole = Role::where('name', User::getUserRole())->first();

        $user->assignRole($userRole);

        Mail::to($user->email)->send(new Subscribe($user->email));

        return view('checkEmail');
    }

    public function dashboard() {

        $user = Auth::user();

        if($user->hasRole(User::getUserRole())) return view('user.dashboard');

        if($user->hasRole(User::getAdminRole())) return view('admin.dashboard');
    }

    public function logout() {

        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
