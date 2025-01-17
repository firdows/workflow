<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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


Route::controller(AuthController::class)->group(function () {

    /**Register */
    Route::inertia('/register', 'Auth/Register')->name('register');
    Route::post('/register', 'store');
    // Route::post('/register', [UserController::class, 'save_register'])->name('save_register');

    /**Login */
    Route::inertia('/login', 'Auth/Login');
    Route::post('/login', 'login');

    /**Logout */
    Route::post('/logout', 'logout');
});
