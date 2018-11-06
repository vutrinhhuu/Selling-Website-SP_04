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

<<<<<<< b11afc705aaea44f888c5f0cdde5ffe085913041

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/details-product/{id}',[
	'as'	=>	'detailsproduct',
	'uses'	=>	'PageController@getDetails'
]);

=======
Route::get('/details-product/{id}',[

	'as'	=>	'detailsproduct',
	'uses'	=>	'PageController@getDetails'
]);
>>>>>>> first Commnit from KHOI
