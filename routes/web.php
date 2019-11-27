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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('the-loai/{slug}-{id}','CategoryController@getListBook')->name('get.list.book');
Route::get('sach/{slug}-{id}','BookDetailController@bookDetail')->name('get.detail.book');
