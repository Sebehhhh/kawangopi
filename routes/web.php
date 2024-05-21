<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

#GUEST
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

#AUTHENTICATED
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
        Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/kategoriProduk', [KategoriProdukController::class, 'index'])->name('kategoriProduk');
        Route::post('/kategoriProduk/store', [KategoriProdukController::class, 'store'])->name('kategoriProduk.store');
        Route::put('/kategoriProduk/update', [KategoriProdukController::class, 'update'])->name('kategoriProduk.update');
        Route::delete('/kategoriProduk/destroy/{id}', [KategoriProdukController::class, 'destroy'])->name('kategoriProduk.destroy');

        Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
        Route::post('/produk/store', [produkController::class, 'store'])->name('produk.store');
        Route::put('/produk/update', [produkController::class, 'update'])->name('produk.update');
        Route::delete('/produk/destroy/{id}', [produkController::class, 'destroy'])->name('produk.destroy');

        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
        Route::get('/transaksi/export', [TransaksiController::class, 'export'])->name('transaksi.export');
        Route::post('/transaksi/store', [transaksiController::class, 'store'])->name('transaksi.store');
        Route::put('/transaksi/update', [transaksiController::class, 'update'])->name('transaksi.update');
        Route::delete('/transaksi/destroy/{id}', [transaksiController::class, 'destroy'])->name('transaksi.destroy');
    });
});

#LANDINGPAGE
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');
Route::prefix('landingpage')->name('landingpage.')->group(function () {
    Route::get('/about', [LandingPageController::class, 'about'])->name('about');
    Route::get('/service', [LandingPageController::class, 'service'])->name('service');
    Route::get('/menu', [LandingPageController::class, 'menu'])->name('menu');
    Route::get('/booking', [LandingPageController::class, 'booking'])->name('booking');
    Route::get('/team', [LandingPageController::class, 'team'])->name('team');
    Route::get('/testimonial', [LandingPageController::class, 'testimonial'])->name('testimonial');
    Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
});
