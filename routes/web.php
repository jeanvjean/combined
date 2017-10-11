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



Route::group(['middleware'=>['web']],function(){
    Route::get('add_to_cart/{id}',['uses'=>'ProductController@getAddToCart','as'=>'products.addToCart']);
    Route::get('shopping-cart',['uses'=>'ProductController@getCart','as'=>'products.shoppingCart']);
    Route::get('checkout',['uses'=>'ProductController@getCheckout', 'as'=>'checkout']);
    Route::post('checkout',['uses'=>'ProductController@postCheckout', 'as'=>'checkout']);

    Route::get('/','PagesController@getIndex');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('profile', 'ProfileController');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

Auth::routes();

Route::get('/welcome', 'PagesController@getIndex')->name('welcome');
