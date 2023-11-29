<?php

use App\Http\Controllers\admin\CatalogsController;
use App\Http\Controllers\admin\ContactsController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\JobsController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SectorsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\site\MarcasController;
use App\Http\Controllers\site\SiteController;
use App\Http\Controllers\site\SobreController;
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

Route::prefix('contacts')
    ->controller(ContactsController::class)
    ->group(function () {
       Route::get('/', 'index')->name('contacts');

       Route::get('/view-details-contact/{id}', 'viewDetailsContact')->name('contacts.view-details');
       Route::get('/admin/pages/contacts/delete/{id}', 'deleteContact')->name('contacts.delete');
    });

Route::prefix('sectors')
    ->controller(SectorsController::class)
    ->group(function () {
        Route::get('/', 'index')->name('sectors');
        Route::get('/view-create-sector', 'viewCreateSector')->name('sectors.view-create');
        Route::post('/create', 'createSector')->name('sectors.create');

        Route::get('/view-update-sector/{id}', 'viewUpdateSector')->name('sectors.view-update');
        Route::post('/update/{id}', 'updateSector')->name('sectors.update');

        Route::get('/admin/pages/sectors/delete/{id}', 'deleteSector')->name('sectors.delete');
    });

Route::prefix('jobs')
    ->controller(JobsController::class)
    ->group(function () {
       Route::get('/', 'index')->name('jobs');

       Route::get('/view-create-jobs', 'viewCreateJobs')->name('jobs.view-create');
       Route::post('/create', 'createJobs')->name('jobs.create');

       Route::get('/view-update-jobs/{id}', 'viewUpdateJobs')->name('jobs.view-update');
       Route::post('/update/{id}', 'updateJobs')->name('jobs.update');

         Route::get('/admin/pages/jobs/delete/{id}', 'deleteJobs')->name('jobs.delete');

         Route::get('/view-received-jobs/{id}', 'viewReceivedJobs')->name('jobs.view-received');
         Route::get('/view-details-resumes/{id}', 'viewDetailsResumes')->name('jobs.view-details-resumes');

         Route::get('/admin/pages/jobs/delete-resume/{id}', 'deleteResume')->name('jobs.delete-resume');
    });


/*
|--------------------------------------------------------------------------
| Prefix Site Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::prefix('sobre')
    ->controller(SobreController::class)
    ->group(function () {
        Route::get('/quem-somos', 'quemSomos')->name('quem-somos');
        Route::get('/trabalhe-conosco', 'trabalheConosco')->name('trabalhe-conosco');
        Route::get('/contato-geral', 'contatoGeral')->name('contato-geral');
        Route::post('/enviar-contato', 'enviarContato')->name('enviar-contato');

        Route::get('/descricao-vaga/{id}', 'descricaoVaga')->name('descricao-vaga');
        Route::post('/enviar-curriculo/{id}', 'enviarCurriculo')->name('enviar-curriculo');
    });

Route::prefix('marcas')
    ->controller(MarcasController::class)
    ->group(function () {
        Route::get('/casspet', 'indexCasspet')->name('casspet');
        Route::get('/imbativel', 'indexImbativel')->name('imbativel');
        Route::get('/lactomais', 'indexLactomais')->name('lactomais');
        Route::get('/thorxx', 'indexThorxx')->name('thorxx');
        Route::get('/sellenza', 'indexSellenza')->name('sellenza');
    });

/*
|--------------------------------------------------------------------------
| END Prefix Site Routes
|--------------------------------------------------------------------------
*/
