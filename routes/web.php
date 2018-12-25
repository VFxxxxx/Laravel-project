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
// Authentication Routes...
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//users resource
Route::resource('users', 'UserController')->middleware('role:admin');

//get data for ajax
Route::get('getusers', 'UserController@getUsers')->name('getusers');

Route::get('home','PageController@index')->middleware('auth');
