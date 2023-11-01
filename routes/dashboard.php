<?php

use App\Http\Controllers\Dashboard\{AdminController, AgendaController, AuthController, CategoryController, ChallengeCategoryController, ChallengeController, DashboardController, InterestController, LeaderBoardController, RoleController, UserController};
use App\Models\Challenge;
use Illuminate\Support\Facades\{Artisan, Route};
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

    ],
    function () {
        Route::group(['prefix' => 'dashboard'],function () {

            Route::controller(AuthController::class)->group(function () {
                Route::get('login', 'loginForm')->name('admin.login');
                Route::post('login', 'login')->name('postLogin');

                Route::get('reset-password', 'getResetPassword')->name('getResetPassword');
                Route::post('reset-password', 'postResetPassword')->name('postResetPassword');
                Route::get('check-reset-password', 'checkResetCode');
                Route::post('change-password', 'changePassword')->name('changePassword');
            });

            Route::middleware(['auth:admins'])->group(function () {
                Route::controller(AuthController::class)->group(function () {
                    Route::get('logout', 'logout')->name('logout');
                });

                Route::controller(DashboardController::class)->group(function () {
                    Route::get('/index', 'index')->name('index');
                    Route::get('/dashboard', 'dashboard')->name('dashboard');
                });

                Route::controller(AdminController::class)->prefix('admins')->name('admins.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });

                Route::controller(RoleController::class)->prefix('roles')->name('roles.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/', 'show')->name('show');
                    Route::put('/{id}/', 'update')->name('update');
                    /** ajax routes **/
                    Route::get('role/{id}/admins', 'admins');
                });

                Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });
                Route::controller(InterestController::class)->prefix('interests')->name('interests.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });
                Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });
                Route::controller(ChallengeCategoryController::class)->prefix('challengecategories')->name('challengecategories.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });
                Route::controller(AgendaController::class)->prefix('agendas')->name('agendas.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                });
                Route::controller(ChallengeController::class)->prefix('challenges')->name('challenges.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/{id}/edit', 'edit')->name('edit');
                    Route::put('/{id}/update', 'update')->name('update');
                    Route::delete('/{id}/', 'destroy')->name('delete');
                    Route::get('/{id}/', 'show')->name('show');

                });

            });
        });
    }
);
