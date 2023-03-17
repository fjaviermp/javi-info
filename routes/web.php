<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OptionsController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('frontOffice/Home', [
        'options' => OptionsController::getOptions()
    ]);
});

Route::get('/test','App\Http\Controllers\OptionsController@getOptions');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
