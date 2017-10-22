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


Route::get('add_to_cart/{id}',['uses'=>'ProductController@getAddToCart','as'=>'products.addToCart']);
Route::get('shopping-cart',['uses'=>'ProductController@getCart','as'=>'products.shoppingCart']);

Route::group(['middleware'=>['web']],function(){

    Route::get('checkout',['uses'=>'ProductController@getCheckout', 'as'=>'checkout']);
    Route::post('checkout',['uses'=>'ProductController@postCheckout', 'as'=>'checkout']);

    Route::get('/','PagesController@getIndex');
    Route::resource('products', 'ProductController');

    Route::resource('categories', 'CategoryController');

    Route::get('/profile/{slug}','ProfileController@index');
    Route::get('/changeImage','ProfileController@changeImage');
    Route::post('/uploadImage','ProfileController@uploadImage');
    Route::get('/editProfile/{slug}','ProfileController@editProfile');
    Route::post('/updateProfile','ProfileController@updateProfile');

    Route::get('/findFriends', 'ProfileController@findFriends');
    Route::get('/addFriend/{id}', 'ProfileController@sendRequest');
    Route::get('/requests', 'ProfileController@requests');
    Route::get('/unfollow/{id}', 'ProfileController@unfollow');
    Route::get('/notifications/{id}', 'ProfileController@notifications');
    //Route::get('/accept/{name}/{id}', 'ProfileController@accept');

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

Auth::routes();

Route::get('/welcome', 'PagesController@getIndex')->name('welcome');
