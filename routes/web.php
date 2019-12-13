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
Route::resource('usuarios', 'usuariosController');
Route::resource('aseguradoras', 'aseguradorasController');
Route::resource('categorias', 'categoriasController');
Route::resource('autos', 'autosController');
Route::resource('marcas', 'marcasController');

Route::get('/Admin','adminController@index');