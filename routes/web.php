<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// WAJIB DI ATAS ROUTE LAIN
// Redirect root ke login jika belum login, atau ke dashboard jika sudah login
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

// Dashboard - Hanya untuk user yang sudah login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Kategori
Route::middleware('auth')->group(function () {
    Route::get('/kategori', [\App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [\App\Http\Controllers\KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}/edit', [\App\Http\Controllers\KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [\App\Http\Controllers\KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [\App\Http\Controllers\KategoriController::class, 'destroy'])->name('kategori.destroy');
});

// Transaksi
Route::middleware('auth')->group(function () {
    Route::get('/transaksi', [\App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi', [\App\Http\Controllers\TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{id}/edit', [\App\Http\Controllers\TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{id}', [\App\Http\Controllers\TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{id}', [\App\Http\Controllers\TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});

// Route bawaan Breeze
require __DIR__.'/auth.php';
