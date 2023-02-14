<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

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

Route::get('/transaksi', function () {
    return view('transaksi');
});

Route::get('/HistoriTransaksi', function () {
    return view('HistoriTransaksi');
});

Route::get('/detailtransaksi', function () {
    return view('DetailTransaksi');
});

Auth::routes();

Route::get('history', [TransaksiController::class,'history']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('transaksi',TransaksiController::class);
Route::resource('item',ItemController::class);
Route::get('item/{id}/hapus',[ItemController::class,'hapus'])->name('item.hapus');
Route::resource('kategori',KategoriController::class);
Route::get('kategori/{id}/hapus',[KategoriController::class,'hapus'])->name('kategori.hapus');
route::post('transaksi/checkout',[TransaksiController::class,'checkout'])->name('transaksi.checkout');

