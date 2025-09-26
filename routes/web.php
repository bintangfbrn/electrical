<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManajemen\PermissionController;
use Illuminate\Support\Facades\Route;

// Rute yang hanya bisa diakses oleh tamu (guest)
Route::middleware('guest')->group(function () {
    // Halaman login
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    // Proses login
    Route::post('/ui-login', [LoginController::class, 'login'])->name('ceklogin');
});

// Rute yang butuh autentikasi (auth)
Route::middleware('auth')->group(function () {

    Route::prefix('akun')->name('akun.')->group(function () {
        #permission
        Route::resource('permission', PermissionController::class);
        Route::get('/permission/detail/{id}', [PermissionController::class, 'show'])->name('permission.show');
        // #role
        // Route::resource('role', RoleController::class);
        // Route::get('/role/detail/{id}', [RoleController::class, 'show'])->name('role.show');
        // #user
        // Route::resource('user', UserController::class);
        // Route::get('/user/detail/{id}', [UserController::class, 'show'])->name('user.show');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/ui-logout', [LoginController::class, 'logout'])->name('ceklogout');

    // Rute profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
