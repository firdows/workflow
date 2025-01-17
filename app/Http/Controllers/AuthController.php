<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AuthController extends Controller
{

    public function store(Request $request)
    {
        // dd($request->avatar);



        $field =  $request->validate([
            'avatar' => ['file', 'nullable', 'max:1000'],
            'name' => ['required', 'max:150'],
            'email' => ['required', 'max:150', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        if ($request->hasFile('avatar')) {
            $field['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        // dd($field);

        //Register
        $user = User::create($field);

        //Login
        Auth::login($user);

        Artisan::call('storage:link');

        //Redirect
        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($fields, $request->remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
