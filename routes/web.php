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

Route::get('/', 'PagesController@home')->name('home');
Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/add', 'ProductsController@add')->name('products.add');
Route::post('/products', 'ProductsController@store')->name('products.store');
Route::get('/products/{slug}', 'ProductsController@view')->name('products.view');
Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit');
Route::patch('/products/{id}', 'ProductsController@update')->name('products.update');
Route::get('/products/{id}/delete', 'ProductsController@delete')->name('products.delete');
Route::delete('/products/{id}', 'ProductsController@destroy')->name('products.destroy');
