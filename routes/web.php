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
Route::resource('light', 'LightController');
Route::get('light/{id}/delete', ['as' => 'light.delete', 'uses' => 'LightController@destroy']);
Route::post('light/{id}/update', ['as' => 'light.upd', 'uses' => 'LightController@update']);