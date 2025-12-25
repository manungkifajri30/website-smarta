<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\KartuKendaliController;
use App\Http\Controllers\RuangRapatController;
use App\Http\Controllers\KeamananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard bawaan Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua Route Fitur BPS (Hanya bisa diakses jika sudah Login)
Route::middleware('auth')->group(function () {
    
    // 1. Fitur Perencanaan (Admin Umum)
    Route::get('/perencanaan/create', [PerencanaanController::class, 'create'])->name('perencanaan.create');
    Route::post('/perencanaan', [PerencanaanController::class, 'store'])->name('perencanaan.store');

    // 2. Fitur Kontrak Kerja (Untuk Generate KAK & PKS)
    Route::post('/kontrak', [KontrakController::class, 'store'])->name('kontrak.store');

    // 3. Fitur Kartu Kendali (Pihak Ke-3 / Pekerja)
    Route::get('/kartu-kendali/create', [KartuKendaliController::class, 'create'])->name('kartu-kendali.create');
    Route::post('/kartu-kendali', [KartuKendaliController::class, 'store'])->name('kartu-kendali.store');

    // 4. Fitur Peminjaman Ruang Rapat (Pegawai BPS)
    Route::get('/ruang-rapat/create', [RuangRapatController::class, 'create'])->name('ruang-rapat.create');
    Route::post('/ruang-rapat', [RuangRapatController::class, 'store'])->name('ruang-rapat.store');
    Route::get('/peminjaman-ruang/create', [RuangRapatController::class, 'create'])->name('peminjaman-ruang.create');
    Route::post('/peminjaman-ruang', [RuangRapatController::class, 'store'])->name('peminjaman-ruang.store');

    // 5. Fitur Laporan Keamanan (Satpam)
    Route::get('/keamanan/create', [KeamananController::class, 'create'])->name('keamanan.create');
    Route::post('/keamanan', [KeamananController::class, 'store'])->name('keamanan.store');

    // Route Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

