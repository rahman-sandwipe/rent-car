<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;

// Protected routes (only for authenticated users)
Route::middleware(['auth'])->group(function () {
    // Rental management
    Route::post('/rentals/{car}', [RentalController::class, 'store'])->name('frontend.rentals.store');
    Route::get('/my-rentals', [RentalController::class, 'index'])->name('frontend.rentals.index');
    Route::post('/rentals/{rental}/cancel', [RentalController::class, 'cancel'])->name('frontend.rentals.cancel');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Customers management
    Route::get('customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('customers/{customer}', [CustomerController::class, 'show'])->name('admin.customers.show');
    Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');
});