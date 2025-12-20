<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Redirect after login
|--------------------------------------------------------------------------
*/
Route::get('/redirect', [RedirectController::class, 'index'])
    ->middleware('auth')
    ->name('redirect');

/*
|--------------------------------------------------------------------------
| Role-protected Dashboards
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:provider'])->group(function () {
    Route::get('/provider/dashboard', fn () => view('provider.dashboard'));
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', fn () => view('customer.dashboard'));
});

/*
|--------------------------------------------------------------------------
| Jetstream default dashboard (optional)
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
