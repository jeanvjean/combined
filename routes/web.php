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

//cart
Route::get('add_to_cart/{id}',['uses'=>'ProductController@getAddToCart','as'=>'products.addToCart']);
Route::get('shopping-cart',['uses'=>'ProductController@getCart','as'=>'products.shoppingCart']);
Route::get('/','PagesController@getIndex');
Route::get('showDesign', 'PagesController@showDesign');
Route::get('removeOne/{id}',['uses'=>'ProductController@RemoveOne','as'=>'products.removeOne']);
Route::get('removeAll/{id}',['uses'=>'ProductController@RemoveAll','as'=>'products.removeAll']);

Route::group(['middleware'=>['web','auth']],function(){
    //checkout
    Route::get('checkout',['uses'=>'ProductController@getCheckout', 'as'=>'checkout']);
    Route::post('checkout',['uses'=>'ProductController@postCheckout', 'as'=>'checkout']);
    //Pages Controller
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');

    //resource controllers
    Route::resource('designs','DesignController',['except'=>['create','index','edit','update','show']]);
    Route::resource('products', 'ProductController',['except'=>['edit','update']]);
    Route::resource('categories', 'CategoryController');

    Route::resource('comments','CommentController',['except'=>['create','index','edit','update','show']]);
    //ProfileController
    Route::get('/profile/{slug}','ProfileController@index')->name('profile.index');
    Route::get('/profile/edit/profile','ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update','ProfileController@update')->name('profile.update');
    Route::get('/changeImage','ProfileController@changeImage');
    Route::post('/uploadImage','ProfileController@uploadImage');

    Route::get('/findFriends', 'ProfileController@findFriends');
    Route::get('/addFriend/{id}', 'ProfileController@sendRequest');
    Route::get('/followers', 'ProfileController@followers');
    Route::get('/unfollow/{id}', 'ProfileController@unfollow');
    Route::get('/notifications/{id}', 'ProfileController@notifications');

    //Route::get('/accept/{name}/{id}', 'ProfileController@accept');

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

Auth::routes();

Route::get('/welcome', 'PagesController@getIndex')->name('welcome');
