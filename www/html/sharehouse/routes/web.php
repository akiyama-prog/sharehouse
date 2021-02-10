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

Route::get('/', 'PropertyController@index');

Route::get('/feature-search', 'PropertyController@featureSearch')->name('feature_search');
Route::get('/area-search', 'PropertyController@areaSearch')->name('area_search');
Route::get('/show-property/{property}', 'PropertyController@showProperty')->name('show_property');
