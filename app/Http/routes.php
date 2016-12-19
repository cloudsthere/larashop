<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listing', 'GoodsController@listing');
Route::get('/goods/detail/{id}', 'GoodsController@detail')->name('goods_detail');

Route::get('/order/confirm', ['middleware' => 'auth', 'as' => 'order_confirm', 'uses' => 'OrderController@confirm']);
Route::post('/order/create', ['middleware' => 'auth', 'as' => 'order_create', 'uses' => 'OrderController@create']);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('auth_login');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
