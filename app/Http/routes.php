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

Route::group(['middleware' => ['auth', 'guardian', 'NetworkId', 'preview']], function () {
    Route::match(['post', 'get'], 'logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
    Route::get('/', ['as' => 'home', 'uses' => 'DashboardController@index']);

    Route::group(['prefix' => 'campaigns', 'as' => 'campaigns::'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CampaignController@index']);
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile::'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
    });

    Route::group(['prefix' => 'nodes', 'as' => 'branches::'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'BranchesController@index']);
        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'BranchesController@show']);
    });

});

Route::group(['middleware' => 'notauth'], function () {
    Route::get('login', ['as' => 'auth.index', 'uses' => 'AuthController@index']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
});

Route::get('/choose', ['as' => 'choose.platform', function () {
    return view('choose', [
        'color' => 'black',
        'msg' => Input::has('msg') ? Input::get('msg') : 'Selecciona alguna de las plataformas.'
    ]);
}]);