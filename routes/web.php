<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - INFRA-DAYA Kota Bandung
|--------------------------------------------------------------------------
*/

// Halaman Publik Warga
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/peta-publik', function () {
    return view('welcome');
})->name('peta.publik');

Route::get('/lacak-tiket', function () {
    return view('welcome');
})->name('tracking.publik');

// Dashboard Utama Terotentikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Rute Placeholder Fase Lanjutan (Dilindungi middleware)
    Route::prefix('warga')->name('warga.')->group(function () {
        Route::get('/lapor', fn () => redirect()->route('dashboard'))->name('laporan.create');
        Route::get('/laporan-saya', fn () => redirect()->route('dashboard'))->name('laporan.saya');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/kecamatan', fn () => redirect()->route('dashboard'))->name('kecamatan.index');
        Route::get('/users', fn () => redirect()->route('dashboard'))->name('users.index');
        Route::get('/kategori', fn () => redirect()->route('dashboard'))->name('kategori.index');
        Route::get('/verifikasi', fn () => redirect()->route('dashboard'))->name('verifikasi.index');
        Route::get('/disposisi', fn () => redirect()->route('dashboard'))->name('disposisi.index');
        Route::get('/rekap', fn () => redirect()->route('dashboard'))->name('rekap.index');
    });

    Route::prefix('petugas')->name('petugas.')->group(function () {
        Route::get('/tugas', fn () => redirect()->route('dashboard'))->name('tugas.index');
    });

    Route::prefix('pimpinan')->name('pimpinan.')->group(function () {
        Route::get('/sla', fn () => redirect()->route('dashboard'))->name('sla.index');
        Route::get('/peta', fn () => redirect()->route('dashboard'))->name('peta.index');
        Route::get('/rekap', fn () => redirect()->route('dashboard'))->name('rekap.index');
    });
});

require __DIR__.'/auth.php';
