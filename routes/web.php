<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Auth::routes();

// Dashboard Route for Admin and Company
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Home Route for General Users
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');

// Resource Controllers
Route::resource('users', UserController::class);
Route::resource('companies', CompanyController::class);
