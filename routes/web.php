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
Route::get('/orders', 'AdminController@index')->name('orders') ;
Route::get('/users', 'AdminController@index')->name('orders') ;