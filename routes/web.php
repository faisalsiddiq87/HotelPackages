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

Route::get('/', 'Auth\LoginController@login')->name('login');

Route::post('login', 'Auth\LoginController@doLogin');

Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'package'], function () {
        Route::get('/create', 'PackageController@create')->name('package.create');
        Route::get('/create/{id}', 'PackageController@create')->name('package.update');
        Route::get('/view/{id}', 'PackageController@view')->name('package.view');
    });
});