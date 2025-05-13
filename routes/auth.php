<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;

/** Admin routes */
Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('dashboard',     [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('logout',        [DashboardController::class, 'logout'])->name('logout');
});