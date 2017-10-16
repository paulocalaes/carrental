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

// route to show the login form
Route::get('/', array('uses' => 'HomeController@showLogin'));


// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

Route::get('cars', array('uses' => 'HomeController@listCars'));