<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\UserController;
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

Route::prefix('user')
    ->controller(UserController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('user');

        Route::get('/datatable', 'userDataTable')->name('user-datatable');

        Route::get('/view-create-user', 'viewCreateUser')->name('user.view-create');
        Route::post('/create', 'create')->name('user.create');

        Route::get('/view-update-user/{id}', 'viewUpdateUser')->name('user.view-update');
        Route::post('/update/{id}', 'update')->name('user.update');

        Route::get('/admin/pages/user/delete/{id}', 'delete')->name('delete-user');

        Route::get('/view-profile-user/', 'viewProfileUser')->name('profile-user');
        Route::post('/update-profile/{id}', 'updateUserProfile')->name('user.update-profile');
        Route::post('/update-avatar/{id}', 'updateAvatar')->name('user.update-avatar');

        Route::post('/update-password/{id}', 'updatePassword')->name('user.update-password');
    });

Route::prefix('owners')
    ->controller(OwnersController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('owners');

        Route::get('/datatable', 'ownersDataTable')->name('owners-datatable');

        Route::get('/view-create-owner', 'viewCreateOwners')->name('owners.view-create');
        Route::post('/create', 'create')->name('owners.create');

        Route::get('/view-update-owner/{id}', 'viewUpdateOwner')->name('owners.view-update');
        Route::post('/update/{id}', 'update')->name('owners.update');

        Route::get('/admin/pages/owners/delete/{id}', 'delete')->name('delete-owner');
    });

/*
|--------------------------------------------------------------------------
| Redirect Root URL to Admin Dashboard (Protected by Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/', function () {
    return redirect()->route('dashboard');
});
