<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::controller(PageController::class)->group(function () {
    Route::permanentRedirect('/home', '/');
    Route::get('/', 'index')->name('home');

    Route::name('pages.')->group(function () {
        Route::prefix('pages')
            ->middleware('auth:admin')->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{page:slug}/edit', 'edit')->name('edit');
                Route::match(['put', 'patch'], '/{page:slug}', 'update')->name('update');
                Route::delete('/{page:slug}', 'destroy')->name('destroy');
            });

        // Route::get('/rating', 'rating')->name('rating');

        Route::get('/{page:slug}', 'show')->name('show');
    });
});



Route::get('/test', function () {
    return view('pages.test.test');
})->name('test');
