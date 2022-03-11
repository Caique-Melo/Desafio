<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('produtos', 'ApiController@getAllProduto');

Route::get('produtos/{id}', 'ApiController@getProduto');

Route::post('produtos','ApiController@createProduto');

Route::put('produtos/{id}', 'ApiController@updateProduto');

Route::delete('produtos/{id}','ApiController@deleteProduto');
