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
    return redirect('/articles');
});

Route::get('/articles', 'ArticleController@index')->name('article.list');
Route::get('/article/new', 'ArticleController@create')->name('article.new');
Route::get('/article/{id}', 'ArticleController@show')->name('article.show');
Route::delete('/article/{id}', 'ArticleController@destroy')->name('article.delete');
