<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Protected Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
