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

// Auth Routes (Login, Register, Reset Password, etc.)
Auth::routes();

// General Home Route (Accessible by all authenticated users)
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');

// Dashboard Routes with Role-based Access
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('checkrole:admin');

    Route::get('/company/dashboard', function () {
        return view('company.dashboard');
    })->name('company.dashboard')->middleware('checkrole:company');
});

// Resource Controllers for User and Company
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('companies', CompanyController::class)->middleware('auth');
