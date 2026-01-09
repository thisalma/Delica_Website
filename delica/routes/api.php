<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\ProfileController;

// Sanctum protected routes
Route::middleware('auth:sanctum')->group(function () {

    // --- Cart routes ---
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add/{product}', [CartController::class, 'add']);
    Route::post('/cart/remove/{product}', [CartController::class, 'remove']);

    // --- API JSON endpoints (for Postman / API) ---
    Route::get('/cart-json', [CartController::class, 'apiIndex']);
    Route::post('/cart-json/add/{product}', [CartController::class, 'apiAdd']);
    Route::post('/cart-json/remove/{product}', [CartController::class, 'apiRemove']);

    // --- Profile routes ---
    Route::get('/customer/profile', [ProfileController::class, 'apiProfile']);
    Route::post('/customer/profile', [ProfileController::class, 'apiUpdateProfile']);
});
