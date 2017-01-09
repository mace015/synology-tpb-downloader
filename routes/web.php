<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'auth'], function () {

	Route::get('/', 'PagesController@index')->name('index');
	Route::post('/', 'PagesController@search');

	Route::get('/logout', 'AuthController@logout')->name('logout');

	Route::post('/download', 'DownloadController@download');
	Route::get('/download/delete/{id}', 'DownloadController@deleteDownload')->name('download.delete');

});

Route::group(['middleware' => 'guest'], function () {

	Route::get('/login', 'AuthController@loginForm')->name('login');
	Route::post('/login', 'AuthController@login');

});
