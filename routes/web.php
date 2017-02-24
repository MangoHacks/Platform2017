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

Route::get('/', 'HomeController@index');
Route::get('/register-late', 'HomeController@registerLate');
Route::post('/register-late', 'HomeController@registerLatePost');
Route::get('/post-register', 'HomeController@afterRegister');
Route::get('/confirm', 'HomeController@confirm');
Route::get('/sweetener', 'HomeController@sweetener');
Route::get('/live', 'HomeController@live');