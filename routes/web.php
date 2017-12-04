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

/*
Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
*/

Route::get('/', 'StaticPagesController@home')->name('home');
Route::post('/', 'StaticPagesController@home')->name('home');
Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users', 'UsersController');
Route::get('users/{user}/wishlist', 'UsersController@wishlist')->name('users.wishlist');
Route::get('users/{user}/posting', 'UsersController@posting')->name('users.posting');


Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');


Route::post('/users/collections/{product}', 'CollectionsController@store')->name('collections.store');
Route::delete('/users/collections/{product}', 'CollectionsController@destroy')->name('collections.destroy');

// Route::post('upload_image', 'ProductsController@uploadImage')->name('products.upload_image');


Route::resource('products', 'ProductsController', ['except' => ['index', 'store']]);
Route::get('admin/profile', ['middleware' => 'auth', function () {
    //
}]);
Route::get('products/{product}/uploadImage', 'ImagesController@image')->name('products.uploadImage');
Route::post('products/{product}/uploadImage', 'ImagesController@uploadImage')->name('products.uploadImage');
Route::resource('images', 'ImagesController', ['except' => ['create']]);



Route::post('/products', 'ProductsController@index')->name('products.search');
Route::get('/products', 'ProductsController@index')->name('products.index');
Route::post('/products/create', 'ProductsController@store')->name('products.store');