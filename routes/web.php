<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage.index');
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user');
});

Route::prefix('landingpage')->name('landingpage.')->group(function () {
    Route::get('/about', function () {
        return view('landingpage.about');
    })->name('about');
    Route::get('/service', function () {
        return view('landingpage.service');
    })->name('service');
    Route::get('/menu', function () {
        return view('landingpage.menu');
    })->name('menu');
    Route::get('/booking', function () {
        return view('landingpage.booking');
    })->name('booking');
    Route::get('/team', function () {
        return view('landingpage.team');
    })->name('team');
    Route::get('/testimonial', function () {
        return view('landingpage.testimonial');
    })->name('testimonial');
    Route::get('/contact', function () {
        return view('landingpage.contact');
    })->name('contact');
});
