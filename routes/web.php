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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('users', 'UserController');

Route::get('/users', 'UserController@index')->name('users.index');

Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users', 'UserController@store')->name('users.store');

Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
Route::post('/users/update/{id}', 'UserController@update')->name('users.update');

Route::get('/users/show/{id}', 'UserController@show')->name('users.show');

Route::get('/users/delete/{id}', 'UserController@delete')->name('users.delete');

// videos controller
Route::resource('videos', 'VideoController');

Route::get('/videos/{id}/upload', 'VideoController@upload')->name('videos.upload');
Route::post('/videos/{id}/store_video', 'VideoController@store_video')->name('videos.store_video');

Route::get('/videos/{id}/image', 'VideoController@image')->name('videos.image');
Route::post('/videos/{id}/store_image', 'VideoController@store_image')->name('videos.store_image');

// video categories controller
Route::resource('video_categories', 'VideoCategoryController');