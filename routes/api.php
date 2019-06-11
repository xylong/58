<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api\V1',
    'middleware' => ['bindings']
], function ($api) {

    $api->group([
        'prefix' => 'auth',
    ], function ($api) {
        $api->post('login', 'AuthController@login');
        $api->post('logout', 'AuthController@logout');
        $api->post('refresh', 'AuthController@refresh');
        $api->post('me', 'AuthController@me')->middleware('auth:api');
    });

    $api->group([
        'prefix' => 'admin',
    ], function ($api) {
        $api->post('login', 'AuthAdminController@login');
        $api->post('logout', 'AuthAdminController@logout');
        $api->post('refresh', 'AuthAdminController@refresh');
        $api->post('me', 'AuthAdminController@me')->middleware('auth:admin');
    });

    $api->group([
        'middleware' => 'auth:api'
    ], function ($api) {
        $api->get('/apple', 'TestController@apple')->name('apple');
    });

    $api->group([
        'middleware' => 'auth:admin'
    ], function ($api) {
        $api->get('/banana', 'TestController@banana')->name('banana');
    });
});

//Route::group([
//    'prefix' => 'auth'
//], function ($router) {
//    Route::post('login', 'AuthController@login');
//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//    Route::post('me', 'AuthController@me');
//});
//
//Route::group([
//    'prefix' => 'admin'
//], function ($router) {
//    Route::post('login', 'AuthAdminController@login');
//    Route::post('logout', 'AuthAdminController@logout');
//    Route::post('refresh', 'AuthAdminController@refresh');
//    Route::post('me', 'AuthAdminController@me');
//});
//
//Route::middleware('auth:api')->get('/apple', 'TestController@apple');
//Route::middleware('auth:admin')->get('/banana', 'TestController@banana');
