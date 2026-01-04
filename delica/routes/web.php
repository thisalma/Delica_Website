<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Provider\DashboardController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Redirect After Login (Customer / Provider)
|--------------------------------------------------------------------------
*/
Route::get('/redirect', [RedirectController::class, 'index'])
    ->middleware('auth')
    ->name('redirect');

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', fn () => view('customer.dashboard'))
        ->name('customer.dashboard');

    Route::get('/products', fn () => 'Products Page');
    Route::get('/cart', fn () => 'Cart Page');
    Route::get('/orders', fn () => 'Order History Page');
    Route::get('/profile', fn () => 'Profile Page');
});

/*
|--------------------------------------------------------------------------
| Provider Routes (Approved Only)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:provider'])->group(function () {
    Route::get('/provider/dashboard', fn () => view('provider.dashboard'))
        ->name('provider.dashboard');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (SEPARATE AUTH SYSTEM)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // Admin login
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);

    // Admin protected pages
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))
            ->name('admin.dashboard');

            Route::get('/customers', [CustomerController::class, 'index'])
            ->name('admin.customers');

             // Providers
    Route::get('/providers', [ProviderController::class, 'index'])->name('admin.providers');
    Route::get('/providers/approve/{id}', [ProviderController::class, 'approve'])->name('admin.providers.approve');
    Route::get('/providers/decline/{id}', [ProviderController::class, 'decline'])->name('admin.providers.decline');
    });
});

/*
|--------------------------------------------------------------------------
| Jetstream Default Dashboard (Fallback Only)
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->get('/dashboard', function () {
    return redirect('/redirect');
})->name('dashboard');
