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

Route::get('/getOptions', function () {return OptionsController::getOptions();});

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


//Rutas del panel de administración
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::controller(CategoriesController::class)->group(function () {
        Route::get('/test', 'get');
    });
    Route::get('/options', function () {
        return Inertia::render('backOffice/Options', [
            'options' => OptionsController::getOptions()
        ]);
    })->name('options.show');

    // Toda la parte para las categorias
    Route::get('/categories', function () {
        return Inertia::render('backOffice/Categories', [
            'options' => OptionsController::getOptions(),
            'categories' => CategoriesController::index()
        ]);
    })->name('categories.show');

    Route::get('/categories/edit/{id}', function (Request $request) {
        return Inertia::render('backOffice/CategoriesForm', [
            'options' => OptionsController::getOptions(),
            'category' => CategoriesController::get($request->id)]);
    })->name('categories.editForm');;
    
    Route::get('/categories/create', function (Request $request) {
        return Inertia::render('backOffice/CategoriesForm', [
            'options' => OptionsController::getOptions(),
        ]);
    })->name('categories.createForm');

    Route::post('/categories/update/', function (Request $request) {
        return CategoriesController::update($request);
    });
    Route::post('/categories/insert/', function (Request $request) {
        return CategoriesController::create($request);
    });
    Route::post('/categories/delete/', function (Request $request) {
        return CategoriesController::delete($request);
    });
});