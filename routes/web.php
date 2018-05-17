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

Route::resource('gas', 'GasController');
Route::get('gas/{id}/delete', ['as' => 'gas.delete', 'uses' => 'GasController@destroy']);
Route::post('gas/{id}/update', ['as' => 'gas.upd', 'uses' => 'GasController@update']);

Route::resource('water', 'WaterController');
Route::get('water/{id}/delete', ['as' => 'water.delete', 'uses' => 'WaterController@destroy']);
Route::post('water/{id}/update', ['as' => 'water.upd', 'uses' => 'WaterController@update']);

Route::resource('comunals', 'ComunalsController');
Route::get('comunals/{id}/delete', ['as' => 'comunals.delete', 'uses' => 'ComunalsController@destroy']);
Route::post('comunals/{id}/update', ['as' => 'comunals.upd', 'uses' => 'ComunalsController@update']);

Route::resource('warm', 'WarmController');
Route::get('warm/{id}/delete', ['as' => 'warm.delete', 'uses' => 'WarmController@destroy']);
Route::post('warm/{id}/update', ['as' => 'warm.upd', 'uses' => 'WarmController@update']);