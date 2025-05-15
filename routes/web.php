<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\PageController;

// Frontend routes
Route::controller(PageController::class)->group(function () {
    Route::get('/',                         'home')->name('home');
    Route::get('/about-us',                 'abouts')->name('abouts');
    Route::get('/blogs',                    'blogs')->name('blogs');
    Route::get('/rentals',                  'rentals')->name('rentals');
    Route::get('/contact-us',               'contact')->name('contacts');
});

Route::middleware('guest')->group(function () {
    Route::get('/login',                [AuthController::class, 'login'])->name('login');
    Route::get('/register',             [AuthController::class, 'register'])->name('register');
    Route::get('/password/recovery',    [AuthController::class, 'passwordRecovery'])->name('forgotRecover');
    Route::post('/register',            [AuthController::class, 'registerPost']);
    Route::post('/login',               [AuthController::class, 'loginPost']);
    Route::post('/password/recovery',   [AuthController::class, 'passwordRecoveryPost']);
});


require __DIR__.'/auth.php';