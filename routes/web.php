<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/about', function () {
    return inertia('About');
})->name('about');

Route::get('/test', function () {
    return inertia('Test', ['name' => request('name', 'test')]);
});


Route::get('/progress', function () {
    sleep(2);
    return inertia('Test', ['name' => request('name', 'test')]);
});

Route::get('/shared-data', function () {
    return inertia('SharedData');
});


Route::get('/scroll-preservation', function () {
    return inertia('ScrollPreservation');
})->name("ScrollPreservation");

/** Guest */
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {

        /**Register */
        Route::inertia('/register', 'Auth/Register')->name('register');
        // Route::get('/register', function () {
        //     return Auth::guest() ? inertia('Auth/Register') : redirect(route('dashboard'));
        // })->name('register');
        Route::post('/register', 'store');

        /**Login */
        Route::inertia('/login', 'Auth/Login')->name('login');
        // Route::get('/login', function () {
        //     return Auth::guest() ? inertia('Auth/Login') : redirect(route('dashboard'));
        // })->name('login');
        Route::post('/login', 'login');
    });
});


/** Logged */
Route::middleware('auth')->group(function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');


    /**Logout */
    Route::post('/logout', [AuthController::class, 'logout']);
});
