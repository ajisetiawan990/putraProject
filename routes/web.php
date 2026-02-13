<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| REDIRECT BERDASARKAN ROLE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->get('/redirect', function () {
    $role = strtolower(auth()->user()->role); // amankan huruf besar kecil

    switch ($role) {
        case 'admin':
            return redirect()->route('admin.dashboard');

        case 'petugas':
            return redirect()->route('petugas.dashboard');

        case 'masyarakat':
            return redirect()->route('masyarakat.dashboard');

        default:
            abort(403, 'Role tidak dikenali');
    }
})->name('redirect');

/*
|--------------------------------------------------------------------------
| MASYARAKAT
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:masyarakat'])
    ->prefix('masyarakat')
    ->name('masyarakat.')
    ->group(function () {

        Route::get('/', [MasyarakatController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/create', [MasyarakatController::class, 'create'])
            ->name('create');

        Route::post('/store', [MasyarakatController::class, 'store'])
            ->name('store');
    });

/*
|--------------------------------------------------------------------------
| PETUGAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {

        Route::get('/', [PetugasController::class, 'dashboard'])
            ->name('dashboard');

        // Tanggapan pakai TanggapanController store
        Route::post('/tanggapan', [TanggapanController::class, 'store'])
            ->name('tanggapan.store');
    });

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [PengaduanController::class, 'dashboard'])
            ->name('dashboard');

        Route::put('/status/{id}', [PengaduanController::class, 'updateStatus'])
            ->name('update.status');
    });

/*
|--------------------------------------------------------------------------
| PROFILE ROUTES (semua user)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('profile',[ProfileController::class,'update'])->name('profile.update');
    Route::delete('profile',[ProfileController::class,'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTH (BREEZE)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
