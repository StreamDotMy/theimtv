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



Route::get('/home', 'HomeController@index')->name('home');


//Route::resource('users', 'UserController');
Route::group([
    'prefix'        => 'users',
    'as'            => 'users.',
    'middleware'    => ['auth']
], function(){

    Route::get('/', 'UserController@index')->name('index');
    Route::get('/create', 'UserController@create')->name('create');
    Route::post('/', 'UserController@store')->name('store');
    Route::get('/{user}/edit', 'UserController@edit')->name('edit');
    Route::post('/{user}/update', 'UserController@update')->name('update');
    Route::get('/{user}/show', 'UserController@show')->name('show');
    Route::get('/{user}/delete', 'UserController@delete')->name('delete');

});



// videos controller
Route::resource('videos', 'VideoController');

Route::get('/videos/by_category/{id}', 'VideoController@index')->name('videos.by_category');
Route::get('/videos/{id}/upload', 'VideoController@upload')->name('videos.upload');
Route::post('/videos/{id}/store_video', 'VideoController@store_video')->name('videos.store_video');

Route::get('/videos/{id}/image', 'VideoController@image')->name('videos.image');
Route::post('/videos/{id}/store_image', 'VideoController@store_image')->name('videos.store_image');

// video_categories controller
Route::resource('video_categories', 'VideoCategoryController');

// genre 
Route::resource('genres', 'GenreController');

Auth::routes(['register' => true]);
