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

Route::get('/user', 'UserController@index');

// Route::get('/procurar-xml','XmlController@index')->name('procurar_xml');
Route::get('/','XmlController@index')->name('index');
Route::post('/achar-nf','XmlController@show')->name('procurar_xml_caminho');

Route::get('/user', function() {
});
Auth::routes();
