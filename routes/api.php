<?php

use Illuminate\Support\Facades\Route;


Route::get('/products', 'App\Http\Controllers\ProductsController@index');

Route::post('/product', 'App\Http\Controllers\ProductsController@store');

Route::get('/product/{id}', 'App\Http\Controllers\ProductsController@show');

Route::put('/product/{id}', 'App\Http\Controllers\ProductsController@update');

Route::delete('/product/{id}', 'App\Http\Controllers\ProductsController@destroy');
