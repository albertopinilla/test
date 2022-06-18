<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'InicioController@index')->name('/');

Route::get('productos', 'ProductoController@index')->name('productos.index');
Route::get('productos/nuevo', 'ProductoController@create')->name('productos.create');
Route::post('productos/guardar', 'ProductoController@store')->name('productos.store');
Route::get('productos/{id}/editar', 'ProductoController@edit')->name('productos.edit');
Route::put('productos/{id}', 'ProductoController@update')->name('productos.update');

Route::get('ventas', 'VentaController@index')->name('ventas.index');
Route::get('ventas/generar', 'VentaController@create')->name('ventas.create');
Route::post('ventas/comprar', 'VentaController@store')->name('ventas.store');
