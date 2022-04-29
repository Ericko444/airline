<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VolController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/vols', [VolController::class, 'index']);
Route::get('/reservations/reserver-step-one', [ReservationController::class, 'reserverStepOne'])->name('reservations.step.one');
Route::get('/reservations/reserver-step-two', [ReservationController::class, 'reserverStepTwo'])->name('reservations.step.two');
Route::post('/reservations/reserver-step-one', [ReservationController::class, 'reserverStepOnePost'])->name('reservations.step.one.post');
Route::post('/reservations/reserver-step-two', [ReservationController::class, 'reserverStepTwoPost'])->name('reservations.step.two.post');
Route::post('/reservations/reserver-step-three', [ReservationController::class, 'reserverStepThree'])->name('reservations.step.three');
Route::post('/reservations/prix', [ReservationController::class, 'getPrix'])->name('reservations.step.two.prix');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('vols')->name('vols/')->group(static function() {
            Route::get('/',                                             'VolsController@index')->name('index');
            Route::get('/create',                                       'VolsController@create')->name('create');
            Route::post('/',                                            'VolsController@store')->name('store');
            Route::get('/{vol}/edit',                                   'VolsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'VolsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{vol}',                                       'VolsController@update')->name('update');
            Route::delete('/{vol}',                                     'VolsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('lieus')->name('lieus/')->group(static function() {
            Route::get('/',                                             'LieusController@index')->name('index');
            Route::get('/create',                                       'LieusController@create')->name('create');
            Route::post('/',                                            'LieusController@store')->name('store');
            Route::get('/{lieu}/edit',                                  'LieusController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LieusController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lieu}',                                      'LieusController@update')->name('update');
            Route::delete('/{lieu}',                                    'LieusController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('avions')->name('avions/')->group(static function() {
            Route::get('/',                                             'AvionsController@index')->name('index');
            Route::get('/create',                                       'AvionsController@create')->name('create');
            Route::post('/',                                            'AvionsController@store')->name('store');
            Route::get('/{avion}/edit',                                 'AvionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AvionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{avion}',                                     'AvionsController@update')->name('update');
            Route::delete('/{avion}',                                   'AvionsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categorie-ages')->name('categorie-ages/')->group(static function() {
            Route::get('/',                                             'CategorieAgesController@index')->name('index');
            Route::get('/create',                                       'CategorieAgesController@create')->name('create');
            Route::post('/',                                            'CategorieAgesController@store')->name('store');
            Route::get('/{categorieAge}/edit',                          'CategorieAgesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategorieAgesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{categorieAge}',                              'CategorieAgesController@update')->name('update');
            Route::delete('/{categorieAge}',                            'CategorieAgesController@destroy')->name('destroy');
        });
    });
});