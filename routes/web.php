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

Route::get('/dashboard', function () {
    return view('welcome');
});


Route::get('/home', 'DesktopController@index')->name('desktop.home');
Route::get('/desktop', 'DesktopController@index')->name('desktop.index');
Route::get('/play/{video}', 'DesktopController@play')->name('desktop.play');


//Route::resource('users', 'UserController');
Route::group([
    'prefix'        => 'users',
    'as'            => 'users.',
    'middleware'    => ['auth']
], function(){

    Route::get('/',                 'UserController@index')->name('index');
    Route::get('/create',           'UserController@create')->name('create');
    Route::post('/store',           'UserController@store')->name('store');
    Route::get('/{user}/edit',      'UserController@edit')->name('edit');
    Route::post('/{user}/update',   'UserController@update')->name('update');
    Route::get('/{user}/show',      'UserController@show')->name('show');
    Route::get('/{user}/delete',    'UserController@delete')->name('delete');
    Route::get('/search',           'UserController@search')->name('search');

});

Route::group(   [   
    'prefix'        => 'profile',  // prefix for url pattern
    'as'            => 'profile.', // prefix for route name
    'middleware'    =>  [
                            'auth', // authentication 
                            'can:access_profile, App\User' // policy Model | can:<method name>, Model
                        ]  
    ], 
    function(){

        // http://localhost:8000/users/index
        // route('users:index')
        Route::get('/show',    'ProfileController@show')->name('show');

        Route::get('create', 'ProfileController@create')->name('create');
        Route::post('store', 'ProfileController@store')->name('store');

        Route::get('/edit',    'ProfileController@edit')->name('edit');
        Route::post('/update', 'ProfileController@update')->name('update');

        Route::get('/change_password',   'ProfileController@change_password')->name('change_password');
        Route::post('/update_password',  'ProfileController@update_password')->name('update_password');

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

Auth::routes(['register' => false]);

