<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
 
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'UserController@details');
 	Route::get('getDataByTransaksi', 'TransaksiController@getDataByTransaksi');
    Route::resource('transaksi', 'TransaksiController');
    // Route::get('getStoreByTransaksi', 'TransaksiController@getStoreByTransaksi');
});
Route::get('get_service', 'ServiceController@index');
Route::post('service', 'ServiceController@create');
Route::put('/update_service/{id_service}', 'ServiceController@update');
Route::delete('/delete_service/{id_service}', 'ServiceController@destroy');
Route::get('/get_service/{id_service}', 'ServiceController@show');

Route::get('/getStoreByService', 'StoreController@getStoreByService');
Route::get('get_store', 'StoreController@index');
Route::post('store', 'StoreController@create');
Route::put('/update_store/{id_store}', 'StoreController@update');
Route::delete('/delete_store/{id_store}', 'StoreController@destroy');
// Route::get('/get_store/{id_store}', 'StoreController@show');

// Get::with(array('store'=>function($query){
//     $query->select('id_store','service_id');
// }))->get();

Route::get('/gethistoriByTransaksi', 'HistoriController@gethistoriByTransaksi');
Route::get('get_histori', 'HistoriController@index');
Route::post('histori', 'HistoriController@create');
Route::put('/update_histori/{id_histori}', 'HistoriController@update');
Route::delete('/delete_histori/{id_histori}', 'HistoriController@destroy');
Route::get('/get_histori/{id_histori}', 'HistoriController@show');
// Route::post('register', 'API\UserController@register');
Route::get('getStoreById', 'TransaksiController@getStoreById');
// Route::group(['middleware' => 'auth:api'], function(){
// 	Route::post('details', 'API\UserController@details');
// // Route::middleware('auth:api')->get('/user', function (Request $request) {
// //     return $request->user();
// });
