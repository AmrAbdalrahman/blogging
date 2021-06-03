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

Route::group(['middleware' => ['is_admin'], 'prefix' => 'admin/article'], function () {

    Route::get('/', ['as' => 'articles.index', 'uses' => 'ArticleController@index']);
    Route::get('create', ['as' => 'articles.create', 'uses' => 'ArticleController@create']);
    Route::post('create', ['as' => 'articles.store', 'uses' => 'ArticleController@store']);
    Route::get('{id}', ['as' => 'articles.show', 'uses' => 'ArticleController@show']);
    Route::get('{id}/edit', ['as' => 'articles.edit', 'uses' => 'ArticleController@edit']);
    Route::put('{id}', ['as' => 'articles.update', 'uses' => 'ArticleController@update']);
    Route::get('destroy/{id}', ['as' => 'articles.destroy', 'uses' => 'ArticleController@destroy']);
});


Route::group(['prefix' => 'article'], function () {

    Route::get('filterByCategory/{category_id}', ['as' => 'articles.categoryFilter', 'uses' => 'ArticleController@categoryFilter']);
    Route::get('{id}', ['as' => 'articles.comments', 'uses' => 'ArticleController@articleComments']);

    Route::post('addComment', ['middleware' => ['auth'], 'as' => 'articles.addComment', 'uses' => 'ArticleController@addComment']);
});



