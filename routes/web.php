<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

use App\Http\Controllers\OptionsController;
use App\Http\Controllers\CategoriesController;


Route::get('/', function () {
    return Inertia::render('frontOffice/Home');
});

Route::get('/contacto', function () {
    return Inertia::render('TermsOfService', [
        'options' => OptionsController::getOptions()
    ]);
});

Route::get('/getOptions','OptionsController@getOptions');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('backOffice/Dashboard', [
            'options' => OptionsController::getOptions()
        ]);
    })->name('dashboard');
    Route::get('/user/profile', function () {
        return Inertia::render('Profile/Show', [
            'options' => OptionsController::getOptions()
        ]);
    })->name('profile.show');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::controller(CategoriesController::class)->group(function () {
        Route::get('/test', 'get');
    });
    Route::get('/options', function () {
        return Inertia::render('backOffice/Options', [
            'options' => OptionsController::getOptions()
        ]);
    })->name('options.edit');
});