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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'ArticleController@index');
Route::middleware('auth')->get('/article/create', 'ArticleController@create');
Route::post('/article', 'ArticleController@store')->name('article.store');
Route::get('/article/{article}', 'ArticleController@show')->name('article.show');
Route::post('/article/{article}/comment', 'CommentController@store')->name('comment.store');
Auth::routes();
Route::get('/articles/category/{category}', 'CategoryController@index');
Route::get('/home', 'HomeController@index')->name('home');
