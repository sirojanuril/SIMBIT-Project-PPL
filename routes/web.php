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

Route::get('/', 'halamanController@landing');

Route::get('/login', 'AuthController@login')->name('login');
Route::get('/register','AuthController@register')->name('register');

Route::post('/postlogin','AuthController@postlogin')->name('postlogin');
Route::post('/postregister','AuthController@postregister')->name('postregister');
Route::get('/logut','AuthController@logout')->name('logout');

Route::group(['middleware'=> ['auth:user,pengguna','ceklevel:mitra']], function(){
  Route::get('/dashboard','HalamanController@index')->name('dashboard');
  Route::get('/profilmitra','AkunController@profilmitra')->name('profilmitra');
  Route::post('/akun/{id}/update','AkunController@update');
  Route::get('/datasupplier','HalamanController@datasupplier')->name('datasupplier');
  Route::get('/produksi', 'ProduksiController@index');
  Route::post('/produksi', 'ProduksiController@output_ragi');
  Route::get('/produksi/hitung_tempe', 'ProduksiController@hitung_tempe');
  Route::post('/produksi/hasil_tempe', 'ProduksiController@hasil_tempe');
  Route::get('/keuangan/hitung', 'KeuanganController@index');
  Route::post('/keuangan/hitung', 'KeuanganController@hitung');
  Route::post('/keuangan/hitung_penjualan', 'KeuanganController@hitung_penjualan');
  Route::get('/keuangan/edit/{id}', 'KeuanganController@edit');
  Route::post('/keuangan/hasil_edit/{id}', 'KeuanganController@hasil_edit');
  Route::get('/keuangan', 'KeuanganController@cetak'); 
  Route::get('/keuangan/riwayat', 'KeuanganController@riwayat');
  Route::get('/cetak-data-pertanggal/{tanggal_awal}/{tanggal_akhir}', 'KeuanganController@cetak_laporan')->name('cetak-data-pertanggal');
  Route::get('/transaksi/mitra', 'TransaksiController@mitra');
  Route::get('/transaksi/riwayat', 'TransaksiController@riwayat');
  Route::get('/transaksi/beli/{id}', 'TransaksiController@transaksi'); 
  Route::get('/transaksi/upload_bukti/{id}', 'TransaksiController@upload_bukti');
  Route::post('/transaksi/upload_bukti/{id}', 'TransaksiController@beli'); 
  Route::post('/transaksi/riwayat/{id}', 'TransaksiController@bukti');
  Route::delete('/transaksi/riwayat/{id}', 'TransaksiController@hapus_pesanan');
  Route::get('/transaksi/detail_toko/{id}', 'TransaksiController@detail_toko');
});

Route::group(['middleware'=> ['auth:user,pengguna','ceklevel:mitra,supplier']], function(){
  Route::get('/dashboard','HalamanController@index')->name('dashboard');
});

Route::group(['middleware'=> ['auth:user,pengguna','ceklevel:supplier']], function(){
  Route::get('/profilsupplier','AkunController@profilsupplier')->name('profilsupplier');
  Route::post('/akun/{id}/update2','AkunController@update2');
  Route::get('/transaksi/supplier', 'TransaksiController@supplier');
  Route::post('/transaksi/supplier', 'TransaksiController@data_penjualan');
  Route::get('/transaksi/data_penjualan', 'TransaksiController@data_penjualan_supplier');
  Route::get('/transaksi/ubah_data/{id}', 'TransaksiController@ubah_data_penjualan');
  Route::post('/transaksi/data_penjualan/{id}', 'TransaksiController@data_update');
  Route::get('/transaksi/pesanan', 'TransaksiController@pesanan');
  Route::get('/transaksi/update_pesanan/{id}', 'TransaksiController@update_pesanan');
  Route::post('/transaksi/pesanan/{id}', 'TransaksiController@update_pesanan_baru');
  Route::get('/transaksi/detail_pelanggan/{id}', 'TransaksiController@detail_pelanggan');
});
