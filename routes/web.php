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

Route::resource('riview','RiviewController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addPlace', 'TempatMakanController@create');


Route::get('/asd',function(){
   echo "
   <form style=\"display: inline-block\" method=\"post\" action=\"".route('riview.store')."\">
                                    ". csrf_field() ."
                                    <input type=\"hidden\" name=\"tempat_id\" value=\"1\">
                                    <input type=\"hidden\" name=\"like\" value=\"1\">
                                    <button href=\"#\" class=\"btn btn-danger\">Delete</button>
   </form>
   ";
});