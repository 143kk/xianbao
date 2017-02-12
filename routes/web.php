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

Route::get('/','HomeController@index');
Route::get('/zuanke8','PostController@getFromZuanke8');
Route::get('/xianbao5','PostController@getFromXianbao5');
Route::get('/yueyun','PostController@getFromYueyun');
Route::get('/aiq','PostController@getFromAiq');
Route::get('/xunbaoge','PostController@getFromXunbaoge');
