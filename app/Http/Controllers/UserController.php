<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function register()
    {
        return Inertia::render("User/Register");
    }

    public function save_register(Request $request)
    {
        // dd($request);
        $field =  $request->validate([
            'name' => ['required', 'max:150'],
            'email' => ['required', 'max:150', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        // dd($field);

        //Register
        $user = User::create($field);

        //Login
        Auth::login($user);

        //Redirect
        return redirect()->route('home');
    }
}
