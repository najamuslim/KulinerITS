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

Route::get('/', 'TempatMakanController@index');

Auth::routes();

Route::resource('tempatmakan','TempatMakanController');

Route::resource('review','ReviewController');
Route::resource('like','LikeController');
Route::resource('tipe','TipeController');

Route::get('/home', 'HomeController@index')->middleware('is_admin')->name('home');

Route::get('/addPlace', 'TempatMakanController@create');

Route::get('/search', 'TempatMakanController@search');

