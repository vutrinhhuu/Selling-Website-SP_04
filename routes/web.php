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
    return view('page.index');
});


Route::get('/details-product/{id}',[
	'as'	=>	'detailsproduct',
	'uses'	=>	'PageController@getDetails'
]);


Route::get('/list-products-type/{id}',[
	'as'	=>	'listproductbytype',
	'uses'	=>	'PageController@getListProductsByType'
]);

