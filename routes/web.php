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
// Home
Route::get('/', 'ProductsController@showHighlights');

// Cards
Route::get('cards', 'CardController@list');
Route::get('cards/{id}', 'CardController@show');

// API
Route::put('api/cards', 'CardController@create');
Route::delete('api/cards/{card_id}', 'CardController@delete');
Route::put('api/cards/{card_id}/', 'ItemController@create');
Route::post('api/item/{id}', 'ItemController@update');
Route::delete('api/item/{id}', 'ItemController@delete');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Profile
Route::get('profile', 'Auth\LoginController@login');
Route::get('profile/{id}', 'UserController@showProfile')->name('profile')->where('id','[0-9]+');
Route::post('adminUpdateUserProfile/saveChanges/{id}', 'UserController@updateProfileData')->name('saveUserProfile')->where('id','[0-9]+');

// Manage Users (admin)
Route::get('adminManageUsers', 'UserController@showAllUsers');
Route::get('/adminManageUsers/remove/{id}', 'UserController@destroy')->name('adminManageUsers')->where('id','[0-9]+');
Route::get('adminManageProducts', 'ProductsController@showAllProducts');
//Route::get('adminManageProducts/delete/{id}', 'ProductsController@destroy')->name('adminManageProducts')->where('id','[0-9]+');
Route::post('adminManageProducts/delete', 'ProductsController@destroy')->name('adminManageProducts');
Route::post('adminManageProducts/saveChanges', 'ProductsController@updateProduct')->name('adminManageUpdateProducts');
Route::get('adminManageOrders', 'AdminController@showAllOrders');
Route::post('adminManageOrders/saveChanges/{id}', 'AdminController@saveOrderInfo')->name('adminManageUpdateOrders')->where('id','[0-9]+');
Route::get('adminManageFAQs', 'AdminController@showAllFAQs');
Route::post('adminManageFAQS/saveChanges/{id}', 'AdminController@updateFAQ')->name('adminManageUpdateFAQS')->where('id','[0-9]+');
Route::get('adminManageFAQS/delete/{id}', 'AdminController@destroyFAQ')->name('adminDeleteFAQS')->where('id','[0-9]+');