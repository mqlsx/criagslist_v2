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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::resource('products', 'ProductsController');


Route::post('/users/collections/{product}', 'CollectionsController@store')->name('collections.store');
Route::delete('/users/collections/{product}', 'CollectionsController@destroy')->name('collections.destroy');

Route::post('upload_image', 'ProductsController@uploadImage')->name('products.upload_image');

Route::get('image', 'ProductsController@image')->name('products.image');
Route::post('image', 'ProductsController@uploadImage1')->name('products.image');