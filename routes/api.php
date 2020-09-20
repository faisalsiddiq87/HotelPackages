<?php

use Illuminate\Http\Request;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


Route::group([
    'prefix' => 'package',
    'middleware' => 'auth:api'
], function () {
    Route::post('', 'Api\PackageApiController@store');
    Route::put('{id}', 'Api\PackageApiController@store')->where('id', '[0-9]+');
    Route::get('', 'Api\PackageApiController@findAll');
    Route::get('{id}', 'Api\PackageApiController@findById')->where('id', '[0-9]+');
    Route::delete('{id}', 'Api\PackageApiController@delete')->where('id', '[0-9]+');
    Route::get('hotels', 'Api\PackageApiController@findAllHotels');
});