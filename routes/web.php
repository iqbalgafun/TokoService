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
Route::view('masuk', 'masuk');
// Route::get('transaksi', function () {

//     $transaksi = DB::table('transaksi')->get();

//     return view('transaksi', ['transaksi' => $transaksi]);
// });
Route::get('/transaksi', 'TransaksiController@getDataByTransaksi')->name('transaksi');;
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
