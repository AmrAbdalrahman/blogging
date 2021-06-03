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

Route::group(['middleware' => ['is_admin'], 'prefix' => 'admin/category'], function () {

    Route::get('/', ['as' => 'categories.index', 'uses' => 'CategoryController@index']);
    Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoryController@create']);
    Route::post('create', ['as' => 'categories.store', 'uses' => 'CategoryController@store']);
    Route::get('{id}', ['as' => 'categories.show', 'uses' => 'CategoryController@show']);
    Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoryController@edit']);
    Route::put('{id}', ['as' => 'categories.update', 'uses' => 'CategoryController@update']);
    Route::get('destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoryController@destroy']);

});
