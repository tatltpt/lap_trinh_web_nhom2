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
Route::group(['namespace'=>'Auth'],function(){
    Route::get('dang-nhap','LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap','LoginController@postLogin')->name('post.login');

    Route::get('dang-ky','RegisterController@getRegister')->name('get.register');
    Route::post('dang-ky','RegisterController@postRegister')->name('post.register');
    Route::get('dang-xuat','LoginController@getLogout')->name('get.logout.user');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('the-loai/{slug}-{id}','CategoryController@getListBook')->name('get.list.book');
Route::get('sach','CategoryController@getListBook')->name('get.book.list');
Route::get('sach/{slug}-{id}','BookDetailController@bookDetail')->name('get.detail.book');

Route::prefix('borrowing')->group(function(){
    Route::get('/add/{id}','BorrowingCartController@addBook')->name('add.borrowing.cart');
    Route::get('/delete/{id}','BorrowingCartController@deleteBookItem')->name('delete.borrowing.cart');
    Route::get('/danh-sach','BorrowingCartController@getListBorrowingCart')->name('get.list.borrowing.cart');
});
Route::group(['prefix'=>'gio-hang','middleware'=>'CheckLoginUser'],function(){
    Route::get('/xac-nhan-muon-sach','BorrowingCartController@getFormConfirm')->name('get.form.confirm');
    Route::post('/xac-nhan-muon-sach','BorrowingCartController@saveInfoBorrowingCart');

});
Route::get('lien-he','ContactController@getContact')->name('get.contact');
Route::post('lien-he','ContactController@saveContact');
Route::get('ve-chung-toi','PageStaticController@aboutUs')->name('get.about_us');
