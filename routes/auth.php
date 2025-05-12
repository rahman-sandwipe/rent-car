<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    // Customers management
    Route::get('customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('customers/{customer}', [CustomerController::class, 'show'])->name('admin.customers.show');
    Route::delete('customers/{customer}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');
});