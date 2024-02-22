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



//ルーティングを管理
//ホームに行ったら、/articlesにリダイレクト
Route::get('/', function () {
    return redirect('/articles');
});

//　記事一覧ページ　indexメソッド
// /articlesルーティングに、ArticleControllerのindexメソッドを表示。ルート名をarticle.listに。
Route::get('/articles', 'ArticleController@index')->name('article.list');
//　新規作成ページ　createメソッド
// /articles/newルーティングに、ArticleControllerのcrateメソッドを表示。ルート名をarticle.newに。
Route::get('/article/new', 'ArticleController@create')->name('article.new');
//　記事投稿　storeメソッド
Route::post('/arcile', 'ArticleController@store')->name('article.store');
//　記事編集ページ editメソッド
Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article.edit');
//　記事更新 updateメソッド
Route::post('/article/update/{id}', 'ArticleController@update')->name('article.update');
//　個別表示ページ showメソッド
Route::get('/article/{id}', 'ArticleController@show')->name('article.show');
//　記事削除 destroyメソッド
Route::delete('/article/{id}', 'ArticleController@destroy')->name('article.delete');
