<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginStore() {
        $loginData = request()->validate([
            'email' => ['required', 'email', 'max:255', Rule::exists('users', 'email')],
            'password' => 'required | min:8',
        ], [
            'email.required' => 'We need your Email Address.',
            'password.min' => 'Password must be more than 8 Characters.',
        ]);
        
        if(auth()->attempt($loginData)) {
            if(auth()->user()) {
                return redirect('/')->with('success', "Login Successfully! Welcome Back.");
            } 
        } else {
            return back()->with('login_error', "User Credentials Wrong.");
        }
    }

    public function register() {
        return view("register");
    }
    public function registerStore() {
        $registerData = request()->validate([
            'name' => 'required | max:255 | min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => ['required', 'max:13', Rule::unique('users', 'phone')],
            'password' => 'required | min:8',
        ]);
        $user = User::create($registerData);
        auth()->login($user);
        return redirect('/')->with('success', "Thanks for Registeration! Dear \"$user->name\"");
    }

    public function logout() {
        auth()->logout();
        return redirect('/')->with('success', "Logged Out !!!");
    }
}
