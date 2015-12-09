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

Route::group(['middleware' => 'auth'], function () {
    Route::match(['post', 'get'], 'logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
    Route::get('/', ['as' => 'home', 'uses' => 'DashboardController@index']);
});

Route::group(['middleware' => 'notauth'], function () {
    Route::get('login', ['as' => 'auth.index', 'uses' => 'AuthController@index']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
});