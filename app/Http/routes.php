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
        Route::post('/save-image', ['as' => 'save-image', 'uses' => 'CampaignController@saveImageItem']);
        Route::post('/save-video', ['as' => 'save-video', 'uses' => 'CampaignController@saveVideoItem']);
        Route::get('/view/{id}', ['as' => 'show', 'uses' => 'CampaignController@show']);
        Route::match(['get', 'post'], '/reject', ['as' => 'reject::campaign', 'uses' => 'CampaignController@reject']);
    });

    Route::group(['prefix' => 'reports', 'as' => 'reports::'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'ReportController@index']);
        Route::get('/users', ['as' => 'users', 'uses' => 'ReportController@users']);
        Route::get('/branches', ['as' => 'branches', 'uses' => 'ReportController@branches']);
        Route::get('/devices', ['as' => 'devices', 'uses' => 'ReportController@devices']);
        Route::get('/campaigns', ['as' => 'campaigns', 'uses' => 'ReportController@campaigns']);
        Route::get('/access', ['as' => 'access', 'uses' => 'ReportController@access']);
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

//route for tests de emails
Route::get('/test-email', function () {
    return view('mail.cancel');
});

//ajax calls
Route::post('test',['as' => 'test', 'uses' =>'ReportController@test']);
Route::post('chart_user',['as' => 'chart_user', 'uses' =>'ReportController@userChart']);
