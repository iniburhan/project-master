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

    // POS
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
    Route::post('/customers/delete', [App\Http\Controllers\POS\Admin\MsCustomersController::class, 'destroy']);
    Route::get('/customers/get-all-customer', [App\Http\Controllers\POS\Admin\MsCustomersController::class, 'getAllCustomer']);
    Route::get('/customers/get-customer-show', [App\Http\Controllers\POS\Admin\MsCustomersController::class, 'getCustomerShow']);
    // route Product
    Route::get('/products', [App\Http\Controllers\POS\Admin\MsProductsController::class, 'index']);
    Route::post('/products/store', [App\Http\Controllers\POS\Admin\MsProductsController::class, 'store']);
    Route::post('/products/update', [App\Http\Controllers\POS\Admin\MsProductsController::class, 'update']);
    Route::post('/products/delete', [App\Http\Controllers\POS\Admin\MsProductsController::class, 'destroy']);
    Route::get('/products/get-all-product', [App\Http\Controllers\POS\Admin\MsProductsController::class, 'getAllProduct']);
    Route::get('/products/get-product-show', [App\Http\Controllers\POS\Admin\MsProductsController::class, 'getProductShow']);


    // PajakApp
    // dashboard pajakApp
    Route::get('/dashboard-pajak', [App\Http\Controllers\PajakApp\DashboardController::class, 'index']);
    Route::get('/dashboard-pajak/get-data-pembayar', [App\Http\Controllers\PajakApp\DashboardController::class, 'getJumlahDendaSetiapPembayar']);
    // route Kendaraan
    Route::get('/kendaraan', [App\Http\Controllers\PajakApp\Admin\MsKendaraanController::class, 'index']);
    Route::post('/kendaraan/store', [App\Http\Controllers\PajakApp\Admin\MsKendaraanController::class, 'store']);
    Route::post('/kendaraan/update', [App\Http\Controllers\PajakApp\Admin\MsKendaraanController::class, 'update']);
    Route::post('/kendaraan/delete', [App\Http\Controllers\PajakApp\Admin\MsKendaraanController::class, 'destroy']);
    Route::get('/kendaraan/get-all-kendaraan', [App\Http\Controllers\PajakApp\Admin\MsKendaraanController::class, 'getAllKendaraan']);
    Route::get('/kendaraan/get-kendaraan-show', [App\Http\Controllers\PajakApp\Admin\MsKendaraanController::class, 'getKendaraanShow']);
    // route Pegawai
    Route::get('/pegawai', [App\Http\Controllers\PajakApp\Admin\MsPegawaiController::class, 'index']);
    Route::post('/pegawai/store', [App\Http\Controllers\PajakApp\Admin\MsPegawaiController::class, 'store']);
    Route::post('/pegawai/update', [App\Http\Controllers\PajakApp\Admin\MsPegawaiController::class, 'update']);
    Route::post('/pegawai/delete', [App\Http\Controllers\PajakApp\Admin\MsPegawaiController::class, 'destroy']);
    Route::get('/pegawai/get-all-pegawai', [App\Http\Controllers\PajakApp\Admin\MsPegawaiController::class, 'getAllPegawai']);
    Route::get('/pegawai/get-pegawai-show', [App\Http\Controllers\PajakApp\Admin\MsPegawaiController::class, 'getPegawaiShow']);
    // route Pembayaran
    Route::get('/pembayaran', [App\Http\Controllers\PajakApp\Admin\TrxPembayaranController::class, 'index']);
    Route::post('/pembayaran/store', [App\Http\Controllers\PajakApp\Admin\TrxPembayaranController::class, 'store']);
    Route::post('/pembayaran/update', [App\Http\Controllers\PajakApp\Admin\TrxPembayaranController::class, 'update']);
    Route::post('/pembayaran/delete', [App\Http\Controllers\PajakApp\Admin\TrxPembayaranController::class, 'destroy']);
    Route::get('/pembayaran/get-kendaraan', [App\Http\Controllers\PajakApp\Admin\TrxPembayaranController::class, 'getKendaraan']);
    Route::get('/pembayaran/get-all-pembayaran', [App\Http\Controllers\PajakApp\Admin\TrxPembayaranController::class, 'getAllPembayaran']);
    Route::get('/pembayaran/get-pembayaran-show', [App\Http\Controllers\PajakApp\Admin\TrxPembayaranController::class, 'getPembayaranShow']);
});

