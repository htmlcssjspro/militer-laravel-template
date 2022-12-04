<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserBattleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;


Route::controller(UserAuthController::class)->group(function () {
    Route::middleware('guest:user')->group(function () {
        Route::get('/login', 'login')->name('login');
        // Route::get('login', 'showLoginForm')->name('login');
        // Route::post('login', 'login');

        Route::get('/register', 'register')->name('register');
        // Route::get('register', 'showRegisterForm')->name('register');
        // Route::post('register', 'register');
    });

    Route::middleware('auth:user')->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });
});

Route::prefix('user')
    ->name('user.')->group(function () {
        Route::middleware('auth:user')->group(function () {
            Route::controller(UserPageController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::permanentRedirect('/', '/user/profile');

                // Route::get('/profile', 'profile')->name('profile');
                // Route::get('/buy-gold', 'buyGold')->name('buy-gold');
                // Route::get('/buy-gold-confirmation', 'buyGoldConfirmation')->name('buy-gold-confirmation');
                // Route::get('/withdrawal', 'withdrawal')->name('withdrawal');

                Route::get('/{userPage:slug}', 'show')->name('show');
            });

            // Route::controller(UserBattleController::class)->group(function () {
            //     Route::get('/{battle}/join', 'join')->name('battle.join');
            // });
        });

        Route::prefix('pages')
            ->name('pages.')
            ->middleware('auth:admin')
            ->controller(UserPageController::class)->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{userPage}/edit', 'edit')->name('edit');
                Route::match(['put', 'patch'], '/{userPage}', 'update')->name('update');
                Route::delete('/{userPage}', 'destroy')->name('destroy');
            });
    });

Route::prefix('users')
    ->name('users.')
    ->middleware('auth:admin')
    ->controller(UserController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::match(['put', 'patch'], '/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');

        Route::get('/{user}', 'show')->name('show');
    });
