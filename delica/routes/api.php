<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\ProfileController;

// Sanctum protected routes
Route::middleware('auth:sanctum')->group(function () {
    
    // Get the current user's cart
    Route::get('/cart', [CartController::class, 'index']);

    // Add product to cart
    Route::post('/cart/add/{product}', [CartController::class, 'add']);

    // Remove product from cart
    Route::post('/cart/remove/{product}', [CartController::class, 'remove']);
});

Route::middleware('auth:sanctum')->group(function () {

    // --- Cart routes ---
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add/{product}', [CartController::class, 'add']);
    Route::post('/cart/remove/{product}', [CartController::class, 'remove']);

    // --- Profile routes ---
    Route::get('/customer/profile', [ProfileController::class, 'apiProfile']);
    Route::post('/customer/profile', [ProfileController::class, 'apiUpdateProfile']);
});
