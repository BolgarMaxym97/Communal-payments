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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/light', ['as' => 'light.index', 'uses' => 'LightController@index']);
Route::get('/light/create', ['as' => 'light.create', 'uses' => 'LightController@create']);
Route::post('/light/store', ['as' => 'light.store', 'uses' => 'LightController@store']);
Route::match(['get', 'post'],'/light/update/{id}', ['as' => 'light.update', 'uses' => 'LightController@update']);