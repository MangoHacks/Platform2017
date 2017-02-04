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
Route::get('/register', 'HomeController@register');
Route::post('/register', 'HomeController@registerPost');
Route::get('/post-register', 'HomeController@afterRegister');
Route::get('/sweetener', 'HomeController@sweetener');