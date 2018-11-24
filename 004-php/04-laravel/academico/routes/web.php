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

Route::get('/', 'paginasController@index');

Route::get('/info', 'paginasController@about');

Route::get('/lista', 'paginasController@listar');

Route::get('/estados', 'EstadoController@index');
