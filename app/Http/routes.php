<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('articulos', 'ArticuloController@index');
Route::post('importar-articulo', 'ArticuloController@store');
Route::get('articulo/{id}', 'ArticuloController@show');
Route::get('clientes', 'ClienteController@index');
Route::post('importar-cliente', 'ClienteController@store');
Route::get('cliente/{id}', 'ClienteController@show');
Route::get('ofertas', 'OfertaController@index');
Route::post('importar-oferta', 'OfertaController@store');
