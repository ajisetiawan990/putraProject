<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('welcome'));

/*
|--------------------------------------------------------------------------
| REDIRECT BERDASARKAN ROLE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/redirect', [RedirectController::class, 'handle'])->name('redirect');

/*
|--------------------------------------------------------------------------
| MASYARAKAT
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:masyarakat'])->prefix('masyarakat')->name('masyarakat.')->group(function () {
        Route::get('/', [MasyarakatController::class, 'dashboard'])->name('dashboard');
        Route::get('/create', [MasyarakatController::class, 'create'])->name('create');
        Route::post('/store', [MasyarakatController::class, 'store'])->name('store');
    });

/*
|--------------------------------------------------------------------------
| PETUGAS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:petugas'])->prefix('petugas')->name('petugas.')->group(function () {
        Route::get('/', [PetugasController::class, 'dashboard'])->name('dashboard');
        Route::get('/tanggapan/{id}', [PetugasController::class, 'create'])->name('tanggapan.create');
        Route::post('/tanggapan', [PetugasController::class, 'store'])->name('tanggapan.store');
    });


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::put('/status/{id}', [AdminController::class, 'updateStatus'])->name('update.status');
    });

/*
|--------------------------------------------------------------------------
| PROFILE ROUTES (semua user)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->name('profile.')->group(function () {
    Route::get('edit', [ProfileController::class,'edit'])->name('edit');
    Route::patch('/', [ProfileController::class,'update'])->name('update');
    Route::delete('/', [ProfileController::class,'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH (BREEZE)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
