<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return Inertia::render('Home');
});


Route::get('/test', function () {
    return inertia('Test', ['name' => request('name', 'test')]);
});
