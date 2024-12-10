<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;

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
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('checkrole:admin');
    Route::get('/company/dashboard', function () {
        return view('company.dashboard');
    })->name('company.dashboard')->middleware('checkrole:company');
});

// Resource Controllers for User and Company
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('companies', CompanyController::class)->middleware('auth');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Notification Routes
Route::middleware('auth')->group(function () {
    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::put('notifications/{id}', [NotificationController::class, 'update'])->name('notifications.update');
});

Route::resource('jobs', JobsController::class)->middleware('auth');
