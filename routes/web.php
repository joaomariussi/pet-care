<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MedicalHistoriesController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeterinariansController;
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

        Route::get('/admin/pages/owners/delete/{id}', 'delete')->name('owners.delete');

        Route::get('/view-details-owner/{id}', 'viewDetailsOwner')->name('owners.view-details');
    });

Route::prefix('positions')
    ->controller(PositionsController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('positions');

        Route::get('/datatable', 'positionsDataTable')->name('positions-datatable');

        Route::get('/view-create-positions', 'viewCreatePositions')->name('positions.view-create');
        Route::post('/create', 'create')->name('positions.create');

        Route::get('/view-update-positions/{id}', 'viewUpdatePositions')->name('positions.view-update');
        Route::post('/update/{id}', 'update')->name('positions.update');

        Route::get('/admin/pages/positions/delete/{id}', 'delete')->name('positions-delete');
    });

Route::prefix('employees')
    ->controller(EmployeesController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('employees');

        Route::get('/datatable', 'employeesDataTable')->name('employees-datatable');

        Route::get('/view-create-employees', 'viewCreateEmployees')->name('employees.view-create');
        Route::post('/create', 'create')->name('employees.create');

        Route::get('/view-update-employees/{id}', 'viewUpdateEmployees')->name('employees.view-update');
        Route::post('/update/{id}', 'update')->name('employees.update');

        Route::get('/admin/pages/employees/delete/{id}', 'delete')->name('employees.delete');

        Route::get('/view-details-employees/{id}', 'viewDetailsEmployees')->name('employees.view-details');
    });

Route::prefix('categories')
    ->controller(CategoriesController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('categories');

        Route::get('/datatable', 'categoriesDataTable')->name('categories-datatable');

        Route::get('/view-create-categories', 'viewCreateCategories')->name('categories.view-create');
        Route::post('/create', 'create')->name('categories.create');

        Route::get('/view-update-categories/{id}', 'viewUpdateCategories')->name('categories.view-update');
        Route::post('/update/{id}', 'update')->name('categories.update');

        Route::get('/admin/pages/categories/delete/{id}', 'delete')->name('categories.delete');
    });

Route::prefix('services')
    ->controller(ServicesController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('services');

        Route::get('/datatable', 'servicesDataTable')->name('services-datatable');

        Route::get('/view-create-services', 'viewCreateServices')->name('services.view-create');
        Route::post('/create', 'create')->name('services.create');

        Route::get('/view-update-services/{id}', 'viewUpdateServices')->name('services.view-update');
        Route::post('/update/{id}', 'update')->name('services.update');

        Route::get('/admin/pages/services/delete/{id}', 'delete')->name('services.delete');
    });

Route::prefix('veterinarians')
    ->controller(VeterinariansController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('veterinarians');

        Route::get('/datatable', 'veterinariansDataTable')->name('veterinarians-datatable');

        Route::get('/view-create-veterinarians', 'viewCreateVeterinarians')->name('veterinarians.view-create');
        Route::post('/create', 'create')->name('veterinarians.create');

        Route::get('/view-update-veterinarians/{id}', 'viewUpdateVeterinarians')->name('veterinarians.view-update');
        Route::post('/update/{id}', 'update')->name('veterinarians.update');

        Route::get('/admin/pages/veterinarians/delete/{id}', 'delete')->name('veterinarians.delete');
    });

Route::prefix('medical-histories')
    ->controller(MedicalHistoriesController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('medical_history');

        Route::get('/datatable', 'medicalHistoryDataTable')->name('medical_history-datatable');

        Route::get('/view-create-medical_history', 'viewCreateMedicalHistory')->name('medical_history.view-create');
        Route::post('/create', 'create')->name('medical_history.create');

        Route::get('/view-update-medical_history/{id}', 'viewUpdateMedicalHistory')->name('medical_history.view-update');
        Route::post('/update/{id}', 'update')->name('medical_history.update');

        Route::get('/admin/pages/medical_history/delete/{id}', 'delete')->name('medical_history.delete');
    });

Route::prefix('pets')
    ->controller(PetsController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'index')->name('pets');

        Route::get('/datatable', 'petsDataTable')->name('pets-datatable');

        Route::get('/view-create-pets', 'viewCreatePets')->name('pets.view-create');
        Route::post('/create', 'create')->name('pets.create');

        Route::get('/view-update-pets/{id}', 'viewUpdatePets')->name('pets.view-update');
        Route::post('/update/{id}', 'update')->name('pets.update');

        Route::get('/admin/pages/pets/delete/{id}', 'delete')->name('pets.delete');

        Route::get('/view-details-pets/{id}', 'viewDetailsPets')->name('pets.view-details');
    });

/*
|--------------------------------------------------------------------------
| Redirect Root URL to Admin Dashboard (Protected by Auth Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/', function () {
    return redirect()->route('dashboard');
});
