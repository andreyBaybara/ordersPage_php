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

Route::group(['middleware'=>'auth'], function (){
    Route::get('/','OrdersController@getOrders')->name('orders');
    Route::get('/products','ProductsController@getProducts')->name('products');
    Route::get('/ajaxGetOrders','OrdersController@ajaxGetOrders')->name('ajaxGetOrders');
    Route::get('/edit/{id}','ProductsController@getEditProduct')->name('getEditProduct');
    Route::post('/edit','ProductsController@postEditProduct')->name('postEditProduct');
});

Auth::routes();

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
