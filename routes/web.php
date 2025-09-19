<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Rute yang hanya bisa diakses oleh tamu (guest)
Route::middleware('guest')->group(function () {
    // Halaman login
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    // Proses login
    Route::post('/ui-login', [LoginController::class, 'login'])->name('ui.login');
});

// Rute yang butuh autentikasi (auth)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/ui-logout', [LoginController::class, 'logout'])->name('ui.logout');

    // Rute profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
