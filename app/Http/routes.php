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

Route::get('/', 'UserController@index');

Route::auth();

Route::get('/home_index', 'HomeController@index');
Route::get('/edit', 'HomeController@edit');
Route::post('/update', 'HomeController@update');
Route::get('/test', 'HomeController@test');
Route::post('/store', 'UserController@store');
