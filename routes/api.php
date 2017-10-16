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

Route::middleware('auth:api')
	->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('loginUrl', 'Auth\LoginController@loginUrl');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('cars', 'CarController@store');
Route::group(['middleware' => 'auth:api'], function() {
	Route::get('cars', 'CarController@index');
	Route::get('cars/{car}', 'CarController@show');	
	Route::put('cars/{car}', 'CarController@update');
	Route::delete('cars/{car}', 'CarController@delete');
});