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

Route::get('/', 'PostController@index')->name('home');
Route::resource('posts', 'PostController');

Route::post('/posts/{post}/like', 'LikeController@store');
Route::post('/posts/{post}/unlike', 'LikeController@store');

Auth::routes();
