<?php

use App\Http\Controllers\admin\CatalogsController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\UserController;
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
| Prefix Home Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->controller(HomeController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('home');
    });

//Route::get('/view-home', [''])->name('home');

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


Route::prefix('catalogs')
    ->controller(CatalogsController::class)
    ->group(function () {
        Route::get('/', 'index')->name('catalogs');

        Route::get('/view-create-catalog', 'viewCreateCatalog')->name('catalogs.view-create');
        Route::post('/create', 'create')->name('catalogs.create');
    });
