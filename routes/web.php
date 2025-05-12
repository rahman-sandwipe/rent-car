<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\CarController;

// Frontend routes
Route::get('/',                         [PageController::class, 'home'])->name('frontend.home');
Route::get('/about-us',                 [PageController::class, 'abouts'])->name('frontend.abouts');
Route::get('/blogs',                    [PageController::class, 'blogs'])->name('frontend.blogs');
Route::get('/rentals',                  [PageController::class, 'rentals'])->name('frontend.rentals');
Route::get('/contact-us',               [PageController::class, 'contact'])->name('frontend.contacts');

// Car browsing (available to all)
Route::get('/cars',                     [CarController::class, 'index'])->name('frontend.cars.index');
Route::get('/cars/{car}',               [CarController::class, 'show'])->name('frontend.cars.show');

Route::middleware('guest')->group(function () {
    Route::get('/login',                [PageController::class, 'login'])->name('frontend.login');
    Route::get('/register',             [PageController::class, 'register'])->name('frontend.register');
    Route::get('/forgot-password',      [PageController::class, 'forgotPassword'])->name('frontend.forgot-password');

    Route::post('/login',               [PageController::class, 'loginPost']);   
    Route::post('/register',            [PageController::class, 'registerPost']);
    Route::post('/forgot-password',     [PageController::class, 'forgotPasswordPost']);
});