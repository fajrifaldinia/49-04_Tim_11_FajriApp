<?php

use App\Http\Controllers\DonaturController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Form donatur (bisa diakses tanpa login)
Route::get('/donatur/create', [DonaturController::class, 'create'])
    ->name('donatur.create');

Route::post('/donatur', [DonaturController::class, 'store'])
    ->name('donatur.store');

// Halaman khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin melihat seluruh data donatur
    Route::get('/donatur', [DonaturController::class, 'index'])
        ->name('donatur.index');

    // Admin menambahkan data donatur
    Route::get('/admin/donatur/create', [DonaturController::class, 'createAdmin'])
        ->name('admin.donatur.create');

    Route::post('/admin/donatur', [DonaturController::class, 'storeAdmin'])
        ->name('admin.donatur.store');

    // Admin mengedit dan menghapus data donatur
    Route::get('/donatur/{donatur}/edit', [DonaturController::class, 'edit'])
        ->name('donatur.edit');

    Route::put('/donatur/{donatur}', [DonaturController::class, 'update'])
        ->name('donatur.update');

    Route::delete('/donatur/{donatur}', [DonaturController::class, 'destroy'])
        ->name('donatur.destroy');
});

// Profile Admin
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Authentication Admin
require __DIR__.'/auth.php';