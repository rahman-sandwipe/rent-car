<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CustomerController;




/** API Routes */
Route::middleware('api')->group(function () {
	Route::get('/customerList', [CustomerController::class, 'customerList']);
    Route::get('/adminList',    [CustomerController::class, 'adminList']);
});