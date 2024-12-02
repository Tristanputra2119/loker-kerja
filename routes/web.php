<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Auth::routes();

// Dashboard Route untuk HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route tambahan untuk menampilkan pesan berdasarkan role
Route::get('/home', function () {
    $user = Auth::user();

    // Cek role pengguna dan tentukan pesan
    $message = match ($user->role) {
        'admin' => 'Hello Admin',
        'company' => 'Hello Company',
        default => 'Hello User',
    };

    return view('home', compact('message'));
})->name('home')->middleware('auth');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
