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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::get('/stok', 'StokController@get');
Route::get('/stokid/{stok}', 'StokController@edit');
Route::post('/stok', 'StokController@store');
Route::put('/stokupdate/{stok}', 'StokController@update');
Route::delete('/stokdelete/{stok}', 'StokController@destroy');
Route::get('/gambarstok/{stok}', 'StokController@gambar');
Route::get('/gambar', 'GambarController@get');
Route::post('/gambar', 'GambarController@store');
Route::delete('/gambardelete/{stok}', 'GambarController@destroy');
Route::get('/masuk', 'MasukController@get');
Route::get('/masukid/{masuk}', 'MasukController@edit');
Route::post('/masuk', 'MasukController@store');
Route::put('/masukupdate/{masuk}', 'MasukController@update');
Route::delete('/masukdelete/{masuk}', 'MasukController@destroy');
Route::get('/keluar', 'KeluarController@get');
Route::get('/keluarid/{keluar}', 'KeluarController@edit');
Route::post('/keluar', 'KeluarController@store');
Route::put('/keluarupdate/{keluar}', 'KeluarController@update');
Route::delete('/keluardelete/{keluar}', 'KeluarController@destroy');
Route::get('/kendaraan', 'KendaraanController@get');
Route::get('/kendaraanid/{kendaraan}', 'KendaraanController@edit');
Route::get('/kendaraannama/{kendaraan}', 'KendaraanController@editnm');
Route::post('/kendaraan', 'KendaraanController@store');
Route::put('/kendaraanupdate/{kendaraan}', 'KendaraanController@update');
Route::delete('/kendaraandelete/{kendaraan}', 'KendaraanController@destroy');
Route::get('/merk', 'MerkController@get');
Route::get('/merkid/{merk}', 'MerkController@edit');
Route::get('/merknama/{merk}', 'MerkController@nama');
Route::post('/merk', 'MerkController@store');
Route::put('/merkupdate/{merk}', 'MerkController@update');
Route::put('/merkjumlah/{merk}', 'MerkController@jumlah');
Route::delete('/merkdelete/{merk}', 'MerkController@destroy');
Route::get('/knalpot', 'KnalpotController@get');
Route::get('/knalpotid/{knalpot}', 'KnalpotController@edit');
Route::post('/knalpot', 'KnalpotController@store');
Route::put('/knalpotupdate/{knalpot}', 'KnalpotController@update');
Route::delete('/knalpotdelete/{knalpot}', 'KnalpotController@destroy');