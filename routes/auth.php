<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;

/** Admin routes */
Route::prefix('/')->middleware('auth')->group(function () {
    Route::get('dashboard',     [DashboardController::class, 'dashboardPage'])->name('dashboard');
    Route::get('logout',        [DashboardController::class, 'logout'])->name('logout');
    
    Route::get('customer/cars', [DashboardController::class, 'carsPage'])->name('auth.cars');
    Route::get('customer/rentals', [DashboardController::class, 'rentalsPage'])->name('auth.rentals');
    Route::get('customer/customers', [DashboardController::class, 'customersPage'])->name('auth.customers');
});