<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Frontend\RentalController as FrontendRentalController;

// Authentication routes
Auth::routes();

// Frontend routes
Route::get('/', [PageController::class, 'home'])->name('frontend.home');
Route::get('/about', [PageController::class, 'about'])->name('frontend.about');
Route::get('/contact', [PageController::class, 'contact'])->name('frontend.contact');

// Car browsing (available to all)
Route::get('/cars', [FrontendCarController::class, 'index'])->name('frontend.cars.index');
Route::get('/cars/{car}', [FrontendCarController::class, 'show'])->name('frontend.cars.show');

// Protected routes (only for authenticated users)
Route::middleware(['auth'])->group(function () {
    // Rental management
    Route::post('/rentals/{car}', [FrontendRentalController::class, 'store'])->name('frontend.rentals.store');
    Route::get('/my-rentals', [FrontendRentalController::class, 'index'])->name('frontend.rentals.index');
    Route::post('/rentals/{rental}/cancel', [FrontendRentalController::class, 'cancel'])->name('frontend.rentals.cancel');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $totalCars = \App\Models\Car::count();
        $availableCars = \App\Models\Car::where('availability', true)->count();
        $totalRentals = \App\Models\Rental::count();
        $totalEarnings = \App\Models\Rental::sum('total_cost');
        
        return view('admin.dashboard', compact('totalCars', 'availableCars', 'totalRentals', 'totalEarnings'));
    })->name('admin.dashboard');

    // Cars management
    Route::resource('cars', AdminCarController::class)->except(['show']);

    // Rentals management
    Route::resource('rentals', AdminRentalController::class)->except(['create', 'store']);

    // Customers management
    Route::get('customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('customers/{customer}', [AdminCustomerController::class, 'show'])->name('admin.customers.show');
    Route::delete('customers/{customer}', [AdminCustomerController::class, 'destroy'])->name('admin.customers.destroy');
});

// Home route after login
Route::get('/home', [HomeController::class, 'index'])->name('home');