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

Route::get('/', function () {
	return view('product.index');
});


Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});


Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});

Route::get('/details-product/{id}',[
	'as'  =>  'detailsproduct',
	'uses'  =>  'ProductsController@getDetails'
]);


Route::get('/list-products-type/',[
	'as'  =>  'listproduct',
	'uses'  =>  'ProductsController@getListAllProducts'
]);

Route::get('Search', 'ProductsController@search');

Route::get('add-to-cart/{id}/{id_size_color}/{num_product}',[
	'as'=>'addtocart',
	'uses'=>'CartController@getAddToCart'
]);

Route::get('delete-car/{id_size_color}',[
	'as'=>'deletecart',
	'uses'=>'CartController@getDelItemCart'
]);