<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }

    public function registerRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' =>  Hash::make($request->password),
        ]);

        Mail::to($request->email)->send(new WelcomeMail($user));

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function login()
    {
        return view('users.login');
    }

    public function loginRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login successful.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        return view('users.dashboard');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
