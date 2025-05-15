<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;

/** API Routes */
Route::middleware('api')->group(function () {
    Route::get('/adminList',                        [DashboardController::class, 'adminList']);
    
    /** Customer */
	Route::get('/customerList',                     [CustomerController::class, 'customerList']);
    Route::post('/customer-create',                 [CustomerController::class, 'customerCreate']);
    Route::get('/customer-details/{customer}',      [CustomerController::class, 'customerDetails']);
    Route::get('/customer-edit/{customer}',         [CustomerController::class, 'customerEdit']);
    Route::post('/customer-update/{customer}',      [CustomerController::class, 'customerUpdate']);
    Route::get('/customer-delete/{customer}',       [CustomerController::class, 'customerDelete']);


});