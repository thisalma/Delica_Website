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
| Role-based Dashboards
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    Route::view('/provider/dashboard', 'provider.dashboard');
    Route::view('/customer/dashboard', 'customer.dashboard');

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
