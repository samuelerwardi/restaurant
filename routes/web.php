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

Route::middleware('auth')->group(function(){
	/* Home */
	Route::get('/home', 'HomeController@index')->name('home');
	/* Master Bahan */
	Route::get('master_bahan/list','MasterBahanController@list');
	Route::get('master_bahan/search','MasterBahanController@search');
	Route::resource('master_bahan', 'MasterBahanController');
	/* Master Supplier */
	Route::get('supplier/search','SupplierController@search');
	Route::resource('supplier', 'SupplierController');
	/* Product */
	Route::post('product/validate_stok','ProductController@validate_stok');
	Route::get('product/search','ProductController@search');
	Route::resource('product', 'ProductController');
	/* Transaksi */	
	Route::resource('transaksi_pembelian', 'TransaksiPembelianController');
	Route::resource('transaksi_penjualan', 'TransaksiPenjualanController');
	/* Report */
	Route::prefix('report')->group(function () {
	    Route::get('transaksi_penjualan','ReportController@transaksi_penjualan');
		Route::get('transaksi_penjualan/{id?}', 'ReportController@transaksi_penjualan_view_detail');
	    Route::get('transaksi_pembelian','ReportController@transaksi_pembelian');
		Route::get('transaksi_pembelian/{id?}', 'ReportController@transaksi_pembelian_view_detail');
		Route::get('master_bahans_stok', 'ReportController@master_bahans_stok');
		Route::get('master_bahans_stok/{id}', 'ReportController@master_bahans_stok_detail');
	});

	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});


