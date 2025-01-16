<?php

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


Route::get('/register', [UserController::class, 'register'])
    ->name('register');

Route::post('/register', [UserController::class, 'save_register'])->name('save_register');
