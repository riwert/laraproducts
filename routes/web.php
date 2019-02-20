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

Route::get('/', 'PagesController@home');
Route::get('/products', 'ProductsController@index');
Route::get('/products/add', 'ProductsController@add');
Route::post('/products', 'ProductsController@store');
Route::get('/products/{slug}', 'ProductsController@view');
Route::get('/products/{id}/edit', 'ProductsController@edit');
Route::patch('/products/{id}', 'ProductsController@update');
Route::get('/products/{id}/delete', 'ProductsController@delete');
Route::delete('/products/{id}', 'ProductsController@destroy');
