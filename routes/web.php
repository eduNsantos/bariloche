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
Route::resource('/','UserController')->names([
	'index' => 'index',
	'store' => 'registrarUsuario'
]);

Route::group([
    'prefix' => 'admin'
], function() {
	Route::get('usuario/cadastrar','UsuarioController@index')->name('cadastrar_usuario');
});
Route::get('/xml','XmlController@index')->name('xml');
Route::post('/procurar_xml','XmlController@show')->name('procurar_xml');
Route::resource('/call', 'CallsController');
Route::get('/reasons/create','ReasonController@create');
Route::post('/criar_pastas', 'FoldersController@createAllFolders')->name('criar_pastas');
Auth::routes();
