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
// Route::get('/procurar-xml','XmlController@index')->name('procurar_xml');
Route::group(['prefix' => 'admin'], function() {
	Route::group(['prefix' => 'user'], function() {
		Route::resource('/','UserController');
	});
});

Route::group(['prefix' =>'xml'], function() {
	Route::get('/','XmlController@index')->name('search_xml');
});

// Route::post('/criar_pastas', 'FoldersController@createAllFolders')->name('create_folder');
Auth::routes();
