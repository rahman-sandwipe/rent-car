<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\PageController;

// Frontend routes
Route::get('/',                         [PageController::class, 'home'])->name('frontend.home');
Route::get('/about-us',                 [PageController::class, 'abouts'])->name('frontend.abouts');
Route::get('/blogs',                    [PageController::class, 'blogs'])->name('frontend.blogs');
Route::get('/rentals',                  [PageController::class, 'rentals'])->name('frontend.rentals');
Route::get('/contact-us',               [PageController::class, 'contact'])->name('frontend.contacts');

Route::middleware('guest')->group(function () {
    Route::get('/login',                [AuthController::class, 'login'])->name('frontend.login');
    Route::get('/register',             [AuthController::class, 'register'])->name('frontend.register');

    Route::post('/login',               [AuthController::class, 'loginPost']);   
    Route::post('/register',            [AuthController::class, 'registerPost']);
});