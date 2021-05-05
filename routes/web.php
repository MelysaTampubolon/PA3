<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TokoOnlineController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RiwayatFetchDataController;

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

Route::get('/', [PageController::class, 'index']);

//Login
Route::get('/login', [PageController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);

//Sumber Data
Route::get('/sumberData', [PageController::class, 'showSumberData']);
Route::get('/detailSumberData/{id}', [RiwayatFetchDataController::class, 'show']);

//Produk
Route::get('/showProduk', [PageController::class, 'showProduk']);

//Produk
Route::get('/showTransaksi', [PageController::class, 'showTransaksi']);

//Produk
Route::get('/showConfig', [PageController::class, 'showConfig']);

//Supplier
Route::get('/showSupplier', [PageController::class, 'showSupplier']);
Route::get('/addSupplier', [SupplierController::class, 'create']);
Route::post('/addNewSupplier', [SupplierController::class, 'store']);
Route::get('/deleteSupplier/{id}', [SupplierController::class, 'destroy']);
Route::get('/editSupplier/{id}', [SupplierController::class, 'edit']);
Route::post('/updateSupplier/{id}', [SupplierController::class, 'update']);

//Toko Online
Route::get('/showShop', [PageController::class, 'showShop']);
Route::get('/addToko', [TokoOnlineController::class, 'create']);
Route::post('/addNewToko', [TokoOnlineController::class, 'store']);
Route::get('/deleteToko/{id}', [TokoOnlineController::class, 'destroy']);
Route::get('/editToko/{id}', [TokoOnlineController::class, 'edit']);
Route::post('/updateToko/{id}', [TokoOnlineController::class, 'update']);

//User
Route::get('/showAkun', [PageController::class, 'showAkun']);
Route::get('/addAkun', [UserController::class, 'create']);
Route::post('/addNewAkun', [UserController::class, 'store']);
Route::get('/deleteAkun/{id}', [UserController::class, 'destroy']);
Route::get('/editAkun/{id}', [UserController::class, 'edit']);
Route::post('/updateAkun/{id}', [UserController::class, 'update']);
