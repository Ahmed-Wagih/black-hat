<?php

use App\Http\Controllers\Web\ChallengeController;
use App\Http\Controllers\Web\AgendaController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\ChatController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LeaderboardController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\SettingController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']

    ],
    function () {

        Route::controller(AuthController::class)->name('web.')->group(function () {
            Route::get('login', 'loginForm')->name('login');
            Route::post('login', 'login')->name('login');
            Route::get('register', 'registerForm')->name('register');
            Route::post('register', 'register')->name('register');
            Route::get('interests', 'interests')->name('interests');
            Route::post('interests', 'storeInterests')->name('interests');
            Route::get('gender', 'gender')->name('gender');
            Route::post('gender', 'storeGender')->name('gender');
            Route::get('age', 'age')->name('age');
            Route::post('age', 'storeAge')->name('age');
        });

        Route::group(['middleware' => ['auth:web'], 'as' => 'web.'], function () {
            Route::controller(AuthController::class)->group(function () {
                Route::get('logout', 'logout')->name('logout');
            });

            Route::controller(HomeController::class)->group(function () {
                Route::get('home', 'home')->name('home');
                Route::get('statics', 'statics')->name('statics');
                Route::post('search', 'search')->name('search');
            });

            Route::controller(AgendaController::class)->name('agenda.')->group(function () {
                Route::get('agenda', 'index')->name('index');
                Route::get('all_agendas', 'allAgenda')->name('all_agendas');
                Route::get('agenda/{id}', 'show')->name('show');
                Route::post('agenda/search', 'search')->name('search');

            });

            Route::controller(ChallengeController::class)->name('challenges.')->group(function () {
                Route::get('challenges', 'index')->name('index');
                Route::get('challenges/{id}', 'show')->name('show');
                Route::get('challenges/scan/{id}', 'scan')->name('scan');
                Route::post('challenges/search', 'search')->name('search');
            });

            Route::controller(ChatController::class)->group(function () {
                Route::get('chats', 'chats')->name('chats');
                Route::get('chat/{userId}', 'chat')->name('chat');
                Route::post('chat/{userId}', 'storeChat')->name('chat.send');
                Route::post('chats/search', 'search')->name('chat.search');
            });

            Route::controller(SettingController::class)->name('settings.')->group(function () {
                Route::get('settings', 'index')->name('index');
            });
            Route::controller(LeaderboardController::class)->name('leaderboard.')->group(function () {
                Route::get('leaderboard', 'index')->name('index');
            });

            Route::controller(ProfileController::class)->group(function () {
                Route::get('profile', 'profile')->name('profile');
                Route::get('edit-profile', 'editProfile')->name('editprofile');
                Route::put('update-profile', 'updateProfile')->name('updateprofile');
            });

            Route::get('/platform', function () {
                return view('web.platform');
            })->name('platform');
            
            Route::get('/map', function () {
                return view('web.areas');
            })->name('map');

            Route::get('/', function () {
                return view('web.index');
            })->name('index');
            
            Route::get('/welcome', function () {
                return view('web.welcome');
            })->name('welcome');

            Route::get('/scan-qr-code', function () {
                return view('web.scan_qrcode');
            })->name('scan_qrcode');
        });


        Route::get('install', function () {
            Artisan::call('key:generate');
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');
        });
    }
);
