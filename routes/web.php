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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PrefpostsController@index');

Route::get('pref/{id}/create', 'PrefpostsController@create')->name('pref.create');
Route::post('pref/{id}', 'PrefpostsController@store')->name('pref.store');
Route::get('pref/{id}/show', 'PrefpostsController@show')->name('pref.show');
