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
Auth::routes();
/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', 'HomeController@index')->name('index');
/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
/*
|--------------------------------------------------------------------------
| contact Route
|--------------------------------------------------------------------------
|
*/
Route::get('/contact', 'ContactController@show');
/*
|--------------------------------------------------------------------------
| contact WITH SEND Message Route
|--------------------------------------------------------------------------
|
*/
Route::post('/contact',  'ContactController@mailToAdmin'); 
/*
|--------------------------------------------------------------------------
| wishlist Route
|--------------------------------------------------------------------------
|
*/
Route::get('/wishlist', 'WishlistController@wishlist')->name('products.wishlist');
/*
|--------------------------------------------------------------------------
| Web resource
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('news','newsController');
Route::resource('category','categorycontroller');
Route::resource('book','bookcontroller');
Route::resource('products','Productscontroller');
Route::resource('review','Reviewcontroller');
Route::resource('Wishlist','WishlistController');
Route::resource('Message','Messagecontroller');
Route::resource('comments','Commentscontroller');
/*
|--------------------------------------------------------------------------
| search controller RETURN search PAGE Route
|--------------------------------------------------------------------------
|
*/
Route::get('search', 'searchcontroller@search')->name('search');