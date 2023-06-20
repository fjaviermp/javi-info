<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

use App\Http\Controllers\OptionsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\ImageController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::get('/', function () {
    return Inertia::render('frontOffice/Home', [
        'options' => OptionsController::getOptions(),
        'categories' => ContentController::getAllCats()
    ]);
})->name('home');

Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    $enableViews = config('fortify.views', true);
    if ($enableViews) {
        Route::get('/login', function () {
            return Inertia::render('Auth/Login', [
                'options' => OptionsController::getOptions(),
                'categories' => ContentController::getAllCats()
            ]);
        })->middleware(['guest:'.config('fortify.guard')])->name('login');
    }

    $limiter = config('fortify.limiters.login');
    $twoFactorLimiter = config('fortify.limiters.two-factor');
    $verificationLimiter = config('fortify.limiters.verification', '6,1');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:'.config('fortify.guard'),
            $limiter ? 'throttle:'.$limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::get('/getoptions', function () {return OptionsController::getOptions();});

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
    Route::get('/options', function () {
        return Inertia::render('backOffice/Options', [
            'options' => OptionsController::getOptions()
        ]);
    })->name('options.show');

    // Toda la parte para las categorias
    Route::get('/categories', function () {
        return Inertia::render('backOffice/Categories', [
            'options' => OptionsController::getOptions(),
            'categories' => CategoriesController::index('categories')
        ]);
    })->name('categories.show');

    // Subcategorias
    Route::get('/subcategories', function () {
        return Inertia::render('backOffice/Subcategories', [
            'options' => OptionsController::getOptions(),
            'categories' => CategoriesController::index('subcategories')
        ]);
    })->name('subcategories.show');

    //Editar ambas
    Route::get('/categories/edit/{id}', function (Request $request) {
        return Inertia::render('backOffice/CategoriesForm', [
            'options' => OptionsController::getOptions(),
            'category' => CategoriesController::get($request->id, 'categories')]);
    })->name('categories.editForm');
    Route::get('/subcategories/edit/{id}', function (Request $request) {
        return Inertia::render('backOffice/SubcategoriesForm', [
            'options' => OptionsController::getOptions(),
            'category' => CategoriesController::get($request->id, 'subcategories')]);
    })->name('subcategories.editForm');;
    
    //Crear ambas
    Route::get('/categories/create', function (Request $request) {
        return Inertia::render('backOffice/CategoriesForm', [
            'options' => OptionsController::getOptions(),
        ]);
    })->name('categories.createForm');
    Route::get('/subcategories/create', function (Request $request) {
        return Inertia::render('backOffice/SubcategoriesForm', [
            'options' => OptionsController::getOptions(),
        ]);
    })->name('subcategories.createForm');

    Route::post('/categories/update/', function (Request $request) {
        return CategoriesController::update($request);
    });
    Route::post('/categories/insert/', function (Request $request) {
        return CategoriesController::create($request);
    });
    Route::post('/categories/delete/', function (Request $request) {
        return CategoriesController::delete($request);
    });
    Route::post('/categories/search/', function (Request $request) {
        return CategoriesController::search($request);
    });

    // Toda la parte para las entradas
    Route::get('/entries', function () {
        return Inertia::render('backOffice/Entries', [
            'options' => OptionsController::getOptions(),
            'entries' => EntriesController::index()
        ]);
    })->name('entries.show');
    Route::get('/entries/edit/{id}', function (Request $request) {
        return Inertia::render('backOffice/EntriesForm', [
            'options' => OptionsController::getOptions(),
            'categories' => CategoriesController::index(),
            'entry' => EntriesController::show($request->id)]);
    })->name('entries.editForm');;
    Route::get('/entries/create', function (Request $request) {
        return Inertia::render('backOffice/EntriesForm', [
            'options' => OptionsController::getOptions(),
            'categories' => CategoriesController::index(),
        ]);
    })->name('entries.createForm');
    Route::post('/entries/update/', function (Request $request) {
        return EntriesController::update($request);
    });
    Route::post('/entries/insert/', function (Request $request) {
        return EntriesController::store($request);
    });
    Route::post('/entries/delete/', function (Request $request) {
        return EntriesController::delete($request);
    });

    //Subir una imagen
    Route::post('/images/upload/', function (Request $request) {
        return ImageController::store($request);
    });
});