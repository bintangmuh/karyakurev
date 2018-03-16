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
    return view('indexpage');
});

Route::get('/index', function () {
    return view('indexpage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/profile', 'ProfileController@view')->name('profile')->middleware('web');
Route::get('/profile/edit', 'ProfileController@edit')->name('user.edit')->middleware('auth');
Route::get('/profile/{user}', 'ProfileController@viewuser')->name('user.profile')->middleware('web');

Route::group(['prefix' => 'karya', 'as'=> 'karya.'], function () {
    Route::get('/', 'KaryaController@index')->name('tampil');
    Route::get('create/', 'KaryaController@create')->name('buatview')->middleware('auth');
    Route::post('create/', 'KaryaController@store')->name('buat')->middleware('auth');
    Route::post('{karya}/img/upload/', 'KaryaController@uploadimg')->name('buat.gambar')->middleware('auth');
    Route::post('{karya}/video/', 'KaryaController@')->name('buat.video')->middleware('auth');
    Route::get('{karya}/img/delete', 'KaryaController@')->name('hapus.gambar')->middleware('auth');
    Route::get('{karya}/video/delete', 'KaryaController@')->name('hapus.video')->middleware('auth');
    Route::get('{karya}/edit', 'KaryaController@edit')->name('editview')->middleware('auth');
    Route::post('{karya}/edit', 'KaryaController@update')->name('edit')->middleware('auth');
    Route::get('{karya}/delete', 'KaryaController@delete')->name('delete')->middleware('auth');
    Route::get('{karya}', 'KaryaController@show')->name('tampil');
});