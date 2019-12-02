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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

Route::group(['prefix' => 'category'], function () {
    Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');
    Route::get('/create', 'AdminCategoryController@create')->name('admin.get.create.category');
    Route::post('/create', 'AdminCategoryController@store');
    Route::get('/update/{id}', 'AdminCategoryController@edit')->name('admin.get.edit.category');
    Route::post('/update/{id}', 'AdminCategoryController@update');
    Route::get('/{action}/{id}', 'AdminCategoryController@action')->name('admin.get.action.category');

});
Route::group(['prefix' => 'author'], function () {
    Route::get('/', 'AdminAuthorController@index')->name('admin.get.list.author');
        Route::get('/create', 'AdminAuthorController@create')->name('admin.get.create.author');
        Route::post('/create', 'AdminAuthorController@store');
        Route::get('/update/{id}', 'AdminAuthorController@edit')->name('admin.get.edit.author');
        Route::post('/update/{id}', 'AdminAuthorController@update');
        Route::get('/{action}/{id}', 'AdminAuthorController@action')->name('admin.get.action.author');

});
Route::group(['prefix' => 'book'], function () {
    Route::get('/', 'AdminBookController@index')->name('admin.get.list.book');
    Route::get('/create', 'AdminBookController@create')->name('admin.get.create.book');
    Route::post('/create', 'AdminBookController@store');
    Route::get('/update/{id}', 'AdminBookController@edit')->name('admin.get.edit.book');
    Route::post('/update/{id}', 'AdminBookController@update');
    Route::get('/{action}/{id}', 'AdminBookController@action')->name('admin.get.action.book');
});
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'AdminUserController@index')->name('admin.get.list.user');


    });
    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/', 'AdminTransactionController@index')->name('admin.get.list.transaction');
        Route::get('/view/{id}', 'AdminTransactionController@viewBillDetail')->name('admin.get.view.billdetail');
        Route::get('/{action}/{id}', 'AdminTransactionController@action')->name('admin.get.action.transaction');
    });

});
