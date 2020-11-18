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
  Route::get('/keuangan/hitung', 'KeuanganController@index');
  Route::post('/keuangan/hitung', 'KeuanganController@hitung');
  Route::post('/keuangan/hitung_penjualan', 'KeuanganController@hitung_penjualan');
  Route::get('/keuangan/edit/{id}', 'KeuanganController@edit');
  Route::post('/keuangan/hasil_edit/{id}', 'KeuanganController@hasil_edit');  
});

Route::group(['middleware'=> ['auth:user,pengguna','ceklevel:mitra,supplier']], function(){
  Route::get('/dashboard','HalamanController@index')->name('dashboard');
});

Route::group(['middleware'=> ['auth:user,pengguna','ceklevel:supplier']], function(){
  Route::get('/profilsupplier','AkunController@profilsupplier')->name('profilsupplier');
  Route::post('/akun/{id}/update2','AkunController@update2');
});
