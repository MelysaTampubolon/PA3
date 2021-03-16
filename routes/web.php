<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;

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
    return view('dashboard');
});

//Login
Route::get('/login', [PageController::class, 'showLogin']);
Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);

//Sumber Data
Route::get('/sumberData', [PageController::class, 'showSumberData']);
Route::get('/detailSumberData', [PageController::class, 'detailSumberData']);

//Produk
Route::get('/showProduk', [PageController::class, 'showProduk']);

//Produk
Route::get('/showTransaksi', [PageController::class, 'showTransaksi']);

//Produk
Route::get('/showConfig', [PageController::class, 'showConfig']);

//Supplier
Route::get('/showSupplier', [PageController::class, 'showSupplier']);

//Toko Online
Route::get('/showShop', [PageController::class, 'showShop']);

//Toko Online
Route::get('/showAkun', [PageController::class, 'showAkun']);
