<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController; // Untuk halaman publik
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CertificateController;


// Rute Halaman Publik (Portofolio)
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/project/{project:slug}', [PortfolioController::class, 'show'])->name('portfolio.show'); // Untuk detail jika tidak pakai modal

// Rute Dashboard Admin
Route::prefix('admin')->middleware(['auth', 'verified'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('certificates', CertificateController::class);

    // Anda bisa menambahkan route lain di sini jika perlu
});


// Rute Profil Pengguna (bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Autentikasi (dari auth.php yang di-require oleh Breeze)
require __DIR__.'/auth.php';