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
    return view('beta');
});

Route::get('/index', function () {
    return view('indexpage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('web');
Route::get('/profile', 'ProfileController@view')->name('profile')->middleware('web');

Route::group(['prefix' => 'karya', 'as'=> 'karya.'], function () {
    Route::get('/', 'KaryaController@index')->name('tampil');
    Route::get('create/', 'KaryaController@create')->name('buatview')->middleware('auth');
    Route::post('create/', 'KaryaController@store')->name('buat');
    Route::post('{karya}/img/upload/', 'KaryaController@uploadimg')->name('buat.gambar');
    Route::post('{karya}/video/', 'KaryaController@')->name('buat.video');
    Route::get('{karya}/img/delete', 'KaryaController@')->name('hapus.gambar');
    Route::get('{karya}/video/delete', 'KaryaController@')->name('hapus.video');
    Route::get('edit/{karya}', 'KaryaController@editview')->name('editview');
    Route::post('edit/{karya}', 'KaryaController@edit')->name('edit');
    Route::get('delete/{karya}', 'KaryaController@delete')->name('delete');
});