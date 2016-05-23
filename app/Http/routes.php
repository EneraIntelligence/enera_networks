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
    Route::get('/terms', ['as' => 'terms', 'uses' => 'DashboardController@terms']);

    Route::group(['prefix' => 'campaigns', 'as' => 'campaigns::'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CampaignController@index']);
        Route::get('/new', ['as' => 'new', 'uses' => 'CampaignController@newCampaign']);
        Route::get('/view/{id}', ['as' => 'show', 'uses' => 'CampaignController@show']);
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile::'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
        Route::get('/settings', ['as' => 'settings', 'uses' => 'UserController@settings']);
    });

    Route::group(['prefix' => 'nodes', 'as' => 'branches::'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'BranchesController@index']);
        Route::get('/show/{id}', ['as' => 'show', 'uses' => 'BranchesController@show']);
        Route::get('/show/{id}/list', ['as' => 'list', 'uses' => 'BranchesController@clients']);
    });

});

Route::group(['middleware' => 'notauth'], function () {
    Route::get('login', ['as' => 'auth.index', 'uses' => 'AuthController@index']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@login']);
    Route::post('/restore', ['as' => 'auth.restore', 'uses' => 'AuthController@restore']);  //2do paso de recuperar contraseña
    Route::get('/restore/password/{id}/{token}', ['as' => 'auth.reset', 'uses' => 'AuthController@verify']); //3er paso de recuperar contraseña valida el token de nueva contraseña
    Route::get('/restore/password', ['as' => 'auth.newpassword', 'uses' => 'AuthController@newpassword']);   //4to paso de recuperar contraseña vista para poner la nueva contraseña
    Route::post('/restore/password', ['as' => 'auth.newpass', 'uses' => 'AuthController@newpass']);         //5to paso de recuperar contraseña
    Route::get('/remove',['as'=> 'auth.remove','uses'=> 'AuthController@remove']); //cancela los codigos del usuario que se pasa
});

Route::get('/choose', ['as' => 'choose.platform', function () {
    return view('choose', [
        'color' => 'black',
        'msg' => Input::has('msg') ? Input::get('msg') : 'Selecciona alguna de las plataformas.'
    ]);
}]);