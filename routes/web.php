<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Admin\EkstrakurikulerController;
use Illuminate\Support\Facades\Route;

// ===================================
// === ROUTE UNTUK PUBLIK (DEPAN) ===
// ===================================

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profil.edit');    
Route::get('/guru-staf', [PageController::class, 'guruStaf'])->name('guru.staf');
Route::get('/berita', [PageController::class, 'beritaIndex'])->name('berita.index');
Route::get('/berita/{slug}', [PageController::class, 'beritaShow'])->name('berita.show'); 
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');
Route::get('/ppdb', [PageController::class, 'ppdb'])->name('ppdb');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/akademik', [PageController::class, 'akademik'])->name('akademik');




// =========================================
// === ROUTE UNTUK ADMIN (BELAKANG) & AUTH ===
// =========================================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- GRUP ROUTE KHUSUS ADMIN ---
Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        
    // Manajemen Konten
    Route::resource('berita', PostController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('galeri', GaleriController::class);
    Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profil.edit');
    // Pengaturan Sekolah
    Route::get('pengaturan', [PengaturanController::class, 'edit'])->name('pengaturan.edit');
    Route::put('pengaturan', [PengaturanController::class, 'update'])->name('pengaturan.update');
    Route::delete('pengaturan/hapus-gambar/{key}', [App\Http\Controllers\Admin\PengaturanController::class, 'deleteImage'])->name('pengaturan.deleteImage');


    // Ekstrakurikuler
    Route::resource('ekskul', EkstrakurikulerController::class);
});

// Rute Bawaan Breeze
require __DIR__.'/auth.php';