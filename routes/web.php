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

Route::get('/', [
	'as'  =>  'home',
	'uses'  =>  'ProductsController@getHomePage'
]);


Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});


Route::get('/details-product/{id}',[
	'as'  =>  'detailsproduct',
	'uses'  =>  'ProductsController@getDetails'
]);


Route::get('/shop/',[
	'as'  =>  'listproduct',
	'uses'  =>  'ProductsController@getListAllProducts'
]);

Route::get('/search', [
	'as'  =>  'search',
	'uses'  =>  'ProductsController@search'
]);

Route::get('searchByCategory/{id}', 'ProductsController@searchByCategory');

Route::get('add-to-cart/{id}/{id_size_color}/{num_product}',[
	'as'=>'addtocart',
	'uses'=>'CartController@getAddToCart'
]);

Route::get('user/{userId}', 'UserController@getUser')->name('user');

		
Route::get('remove-from-cart/{id}/{id_size_color}/{num_product}',[
	'as'=>'removefromcart',
	'uses'=>'CartController@getRemoveFromCart'
]);

		
Route::get('update-amount-cart/{id}/{id_size_color}/{num_product}',[
	'as'=>'updateamountcart',
	'uses'=>'CartController@getUpdateAmountCart'
]);


Route::get('delete-car/{id_size_color}',[
	'as'=>'deletecart',
	'uses'=>'CartController@getDelItemCart'
]);


$namespacePrefix = '\\'.config('voyager.controllers.namespace').'\\';

Route::get('login', ['uses' => $namespacePrefix.'VoyagerAuthController@login',     'as' => 'login']);
Route::post('login', ['uses' => $namespacePrefix.'VoyagerAuthController@postLogin', 'as' => 'postlogin']);

Route::post('logout', ['uses' => $namespacePrefix.'VoyagerController@logout',  'as' => 'logout']);


Route::get('/cart',[
	'as'=> 'viewcart',
	'uses'=>'CartController@viewCart'
]);

Route::post('/checkout',[
	'as' => 'checkout',
	'uses' => 'CartController@postCheckOut'
]);

Route::get('/checkout',[
	'as' => 'checkout',
	'uses' => 'CartController@getCheckOut'
]);

