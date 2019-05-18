<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/products', 'ProductController@store');
//Route::get('/products', 'ProductController@index');


Route::get('master_bahan/list','MasterBahanController@list');
Route::resource('master_bahan', 'MasterBahanController');


Route::resource('product', 'ProductController');
Route::resource('master_produk', 'MasterProdukController');


Route::resource('transaksi_pembelian', 'TransaksiPembelianController');

Route::resource('transaksi_penjualan', 'TransaksiPenjualanController');