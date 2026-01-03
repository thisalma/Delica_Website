<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Admin\Auth\LoginController;

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
| Redirect after login
|--------------------------------------------------------------------------
|
| All logins are redirected here first. The controller will send users
| to the correct dashboard based on role and approval status.
|
*/
Route::get('/redirect', [RedirectController::class, 'index'])
    ->middleware('auth')
    ->name('redirect');

/*
|--------------------------------------------------------------------------
| Role-Protected Dashboards
|--------------------------------------------------------------------------
|
| These routes are only accessible by users with the correct role.
| Provider dashboard requires approval.
|
*/

// Provider dashboard (approved only)
Route::middleware(['auth', 'role:provider'])->group(function () {
    Route::get('/provider/dashboard', function () {
        return view('provider.dashboard');
    })->name('provider.dashboard');
});

// Customer dashboard
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');
});

//admin
Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


// Optional: Jetstream default dashboard (not really used, but keep if needed)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // You can redirect to /redirect if someone tries /dashboard directly
        return redirect('/redirect');
    })->name('dashboard');
});

Route::prefix('admin')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });
    });
});