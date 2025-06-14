<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Protected Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Include Breeze auth routes
require __DIR__.'/auth.php';
