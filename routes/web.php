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

Route::get('/','StokController@index');
Route::get('/item','StokController@item');
Route::get('/mobil','StokController@mobil');
Route::get('/mobils','StokController@mobils');
Route::get('/merkmotor/{merkmobil}', 'StokController@merkmotor');
Route::get('/merkmotors/{merkmobil}', 'StokController@merkmotors');
Route::get('/merkkendaraan/{merkkendaraan}', 'StokController@merkkendaraan');
Route::get('/merkmobil/{merkmotor}', 'StokController@merkmobil');
Route::get('/merkmobils/{merkmotor}', 'StokController@merkmobils');
Route::get('/motor','StokController@motor');
Route::get('/motors','StokController@motors');
Route::get('/shows/{stok}','StokController@shows');
Route::get('/map',function(){
	return view('map');
});
Route::get('/event',function(){
	return view('event');
});
Route::get('/profile',function(){
	return view('profile');
});
Auth::routes();
Route::resource('stok','StokController');
Route::resource('/merk', 'MerkController');
Route::resource('/kendaraan', 'KendaraanController');
Route::resource('/knalpot', 'KnalpotController');
Route::resource('/stok', 'StokController');
Route::resource('/gambar', 'GambarController');
Route::resource('/admin', 'AdminController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'HomeController@register')->name('register');
