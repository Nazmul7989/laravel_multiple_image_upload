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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'ProductController@index');
Route::get('/product/add', 'ProductController@create')->name('product.add');
Route::post('/product/add', 'ProductController@store')->name('product.add');
//Route::get('/product/show/{id}', 'ProductController@show')->name('product.show');
Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
Route::put('/product/update/{id}', 'ProductController@update')->name('product.update');
Route::delete('/product/delete/{id}', 'ProductController@destroy')->name('product.delete');
