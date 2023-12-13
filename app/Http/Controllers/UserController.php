<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        dd($users);
    }

    public function create()
    {
        return view('pages/register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', Rule::unique('users', 'email'), 'email'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => 'required'
        ]);

        User::create($data);

        return redirect('/accounts/login')->with('message', 'Account created succesfully');
    }

    public function login()
    {
        return view('pages/login');
    }

    public function authen(request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($data))
        {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in');
        }
        else
        {
            return redirect('/')->withErrors(['email' => 'Invalid email and/or password'])->onlyInput('email');
        }
    }

    public function logout(request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    
}
