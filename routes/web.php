<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    // route Home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

    // route Category
    Route::get('/categories', [App\Http\Controllers\POS\Admin\MsCategoriesController::class, 'index']);
    Route::post('/categories/store', [App\Http\Controllers\POS\Admin\MsCategoriesController::class, 'store']);
    // Route::get('/categories/show/{id}', [App\Http\Controllers\POS\Admin\MsCategoriesController::class, 'show']);
    // Route::get('/categories/edit/{id}', [App\Http\Controllers\POS\Admin\MsCategoriesController::class, 'edit']);
    Route::post('/categories/update', [App\Http\Controllers\POS\Admin\MsCategoriesController::class, 'update']);
    // Route::post('/categories/delete', [App\Http\Controllers\POS\Admin\MsCategoriesController::class, 'destroy']); // with modal not sweetalert
    Route::post('/categories/delete/{id}', [App\Http\Controllers\POS\Admin\MsCategoriesController::class, 'destroy']);

    // route Customer
    Route::get('/customers', [App\Http\Controllers\POS\Admin\MsCustomersController::class, 'index']);
    Route::post('/customers/store', [App\Http\Controllers\POS\Admin\MsCustomersController::class, 'store']);
    Route::post('/customers/update', [App\Http\Controllers\POS\Admin\MsCustomersController::class, 'update']);
    // Route::post('/customers/delete', [App\Http\Controllers\POS\Admin\MsCustomersController::class, 'destroy']); // with modal not sweetalert
    Route::post('/customers/delete/{id}', [App\Http\Controllers\POS\Admin\MsCustomersController::class, 'destroy']);
    Route::get('/customers/get-all-customer', [App\Http\Controllers\POS\Admin\MsCustomersController::class, 'getAllCustomer']);

});

