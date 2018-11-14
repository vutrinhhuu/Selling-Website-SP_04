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
