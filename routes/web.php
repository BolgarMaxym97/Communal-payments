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

Route::get('/', ['as' => 'index', 'uses' => 'WelcomeController@index']);
Route::resource('light', 'LightController');
Route::get('light/{id}/delete', ['as' => 'light.delete', 'uses' => 'LightController@destroy']);
Route::post('light/{id}/update', ['as' => 'light.upd', 'uses' => 'LightController@update']);

Route::resource('gas', 'GasController');
Route::get('gas/{id}/delete', ['as' => 'gas.delete', 'uses' => 'GasController@destroy']);
Route::post('gas/{id}/update', ['as' => 'gas.upd', 'uses' => 'GasController@update']);

Route::resource('water', 'WaterController');
Route::get('water/{id}/delete', ['as' => 'water.delete', 'uses' => 'WaterController@destroy']);
Route::post('water/{id}/update', ['as' => 'water.upd', 'uses' => 'WaterController@update']);

Route::resource('comunals', 'ComunalsController');
Route::get('comunals/{id}/delete', ['as' => 'comunals.delete', 'uses' => 'ComunalsController@destroy']);
Route::post('comunals/{id}/update', ['as' => 'comunals.upd', 'uses' => 'ComunalsController@update']);

Route::resource('warms', 'WarmsController');
Route::get('warms/{id}/delete', ['as' => 'warms.delete', 'uses' => 'WarmsController@destroy']);
Route::post('warms/{id}/update', ['as' => 'warms.upd', 'uses' => 'WarmsController@update']);

Route::resource('tarifs', 'TarifsController');
Route::get('tarifs/{id}/delete', ['as' => 'tarifs.delete', 'uses' => 'TarifsController@destroy']);
Route::post('tarifs/{id}/update', ['as' => 'tarifs.upd', 'uses' => 'TarifsController@update']);