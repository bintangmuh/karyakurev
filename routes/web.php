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
Route::get('/explore', 'ExploreController@index')->name('explore')->middleware('auth');
Route::get('/tag', 'ExploreController@index')->name('explore.tag')->middleware('auth');
Route::get('/prodi', 'ExploreController@index')->name('explore.home')->middleware('auth');

Route::get('/profile', 'ProfileController@view')->name('profile')->middleware('auth');

Route::get('/profile/edit', 'ProfileController@editview')->name('user.edit')->middleware('auth');
Route::post('/profile/edit', 'ProfileController@edit')->name('user.postedit')->middleware('auth');

Route::get('/profile/{user}', 'ProfileController@viewUser')->name('user.profile')->middleware('web');
Route::get('/profile/{user}/karya', 'ProfileController@viewKaryaUser')->name('user.karya')->middleware('web');

// Route arya
Route::group(['prefix' => 'karya', 'as'=> 'karya.'], function () {

    // CRUD karya user
    Route::get('create/', 'KaryaController@create')->name('buatview')->middleware('auth');
    Route::post('create/', 'KaryaController@store')->name('buat')->middleware('auth');
    Route::post('{karya}/thumbs/', 'KaryaController@addThumbs')->name('buat.thumbs')->middleware('auth', 'can:update,karya');
    Route::post('{karya}/img/upload/', 'KaryaController@addImage')->name('buat.gambar')->middleware('auth', 'can:update,karya');
    Route::post('{karya}/video/', 'KaryaController@addVideo')->name('buat.video')->middleware('auth', 'can:update,karya');
    Route::post('{karya}/img/delete', 'KaryaController@removeImage')->name('hapus.gambar')->middleware('auth', 'can:update,karya');
    Route::post('{karya}/video/delete', 'KaryaController@removeVideo')->name('hapus.video')->middleware('auth', 'can:update,karya');
    Route::get('{karya}/edit', 'KaryaController@edit')->name('editview')->middleware('auth', 'can:update,karya');
    Route::post('{karya}/edit', 'KaryaController@update')->name('edit')->middleware('auth', 'can:update,karya');
    Route::get('{karya}/delete', 'KaryaController@delete')->name('delete')->middleware('auth', 'can:update,karya');
    
    // penampil karya
    Route::get('{karya}', 'KaryaController@show')->name('tampil');
});

// Admin route 

Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware'=> 'auth'], function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/report', 'AdminController@index')->name('index');
    Route::get('/tags', 'AdminController@index')->name('index');
    Route::get('/prodi', 'AdminController@index')->name('index');
    Route::get('/user', 'AdminController@index')->name('index');
});