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

Route::get('/', 'FrontendController@index')->name('index') ;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home') ;
Route::get('/member/details/{user_id}', 'DetailsController@index') ;


/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
|
*/
Route::get('/admins', 'AdminController@index')->name('admins') ;
Route::post('/admin/create', 'AdminController@admin_registration') ;
Route::get('/orders', 'AdminController@orders')->name('orders') ;
Route::post('/admin/order', 'AdminController@admin_orders')->name('orders') ;
Route::get('/users', 'AdminController@users')->name('users') ;
Route::get('/user/block/{user_id}', 'AdminController@block_user') ;
Route::get('/user/unblock/{user_id}', 'AdminController@unblock_user') ;
Route::get('/user/activate/{user_id}', 'AdminController@activate_user') ;