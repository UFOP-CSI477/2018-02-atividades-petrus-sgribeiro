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
    return view('index');
});

Route::get('/registros', 'ControladorRegistro@index');

Route::get('/equipamentos', 'ControladorEquipamento@index');

Route::get('/equipamentos/novo', 'ControladorEquipamento@create');

Route::post('/equipamentos', 'ControladorEquipamento@store');

Route::get('/equipamentos/apagar/{id}', 'ControladorEquipamento@destroy');

Route::get('/equipamentos/editar/{id}', 'ControladorEquipamento@edit');

Route::post('/equipamentos/{id}', 'ControladorEquipamento@update');
