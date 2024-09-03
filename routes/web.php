<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Prefix Auth Routes
|--------------------------------------------------------------------------
*/
Route::prefix('auth')
    ->controller(LoginController::class)
    ->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/authenticate', 'login')->name('authenticate');
        Route::get('/logout', 'logout')->name('logout');
    });

/*
|--------------------------------------------------------------------------
| Prefix Admin Routes (Protected by Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')
        ->controller(DashboardController::class)
        ->group(function () {
            Route::get('/', 'index')->name('dashboard');
        });
});

/*
|--------------------------------------------------------------------------
| Redirect Root URL to Admin Dashboard (Protected by Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/', function () {
    return redirect()->route('dashboard');
});
