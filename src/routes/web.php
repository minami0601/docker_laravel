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

Route::get('/', 'ArticlesController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('articles', 'ArticlesController', ['only' => ['show']]);
Route::get('user', 'UserController@show')->name('user.show');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('articles', 'ArticlesController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('comments', 'CommentsController', ['only' => ['store', 'destroy']]);
    Route::get('/comments/create/{article}', 'CommentsController@create')->name('comments.create');
});
Route::get('/article/search', 'ArticlesController@search')->name('articles.search');
Route::post('csv/export', 'CsvController@csvExport')->name('csv.export');
