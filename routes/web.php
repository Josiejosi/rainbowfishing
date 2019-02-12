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
Route::get('/member/details/{order_id}', 'DetailsController@index') ;
Route::get('/banking/details/{order_id}', 'DetailsController@banking_details') ;
Route::get('/received/payment/{order_id}', 'DetailsController@received_payment') ;
Route::get('/send/payment/{order_id}', 'DetailsController@send_payment') ;
Route::get('/drop/order/{order_id}', 'DetailsController@drop_order') ;
Route::post('/member/details', 'DetailsController@reserve_member') ;
Route::get('/password', 'ProfileController@index')->name('password')  ;
Route::post('/password/update', 'ProfileController@password_update') ;

Route::get('/account', 'AccountController@index')->name('account')  ;
Route::post('/account/update', 'AccountController@account_update') ;

Route::get('/incoming', 'TransactionController@incoming')->name('incoming')  ;
Route::get('/outgoing', 'TransactionController@outgoing')->name('outgoing')  ;
Route::get('/upcoming', 'UpcomingController@index')->name('upcoming')  ;
Route::get('/phone', 'PhoneController@index')->name('phone') ;
Route::post('/phone', 'PhoneController@phone_update') ;

Route::get('/notifications', 'NotificationsController@index')  ;
Route::get('/notification/markasread/{notification_id}', 'NotificationsController@notification_markasread')  ;


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