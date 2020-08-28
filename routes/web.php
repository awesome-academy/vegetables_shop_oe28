<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'localization'], function() {
    Route::get('lang/{locale}', 'Admins\AdminController@switchLanguage')->name('lang');
});

// Login & logout admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admins'], function () {
    Route::get('login', 'AdminController@getLogin')->name('admin.get_login');
    Route::post('login', 'AdminController@postLogin')->name('admin.post_login');
    Route::get('logout', 'AdminController@getLogout')->name('admin.get_logout');
});

// page Admin
Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin', 'namespace' => 'Admins'], function () {
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    Route::resource('products', 'ProductController');
    Route::resource('supliers', 'SuplierController');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
});

// Client
Route::group(['namespace' => 'Clients'], function () {
    Route::get('/', 'HomeController@index')->name('client.homepage');
    Route::get('post', 'PostController@index')->name('client.post_index');
    Route::get('product', 'ProductController@index')->name('client.all_product');
    Route::get('introduce', 'HomeController@introduce')->name('client.introduce');
    Route::get('delivery', 'HomeController@delivery')->name('client.delivery');
    Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('client.add_cart');
    Route::get('delete-item-cart/{id}', 'CartController@deleteItemCart');
    Route::get('view-cart', 'CartController@viewCart')->name('client.view_cart');
    Route::get('delete-list-item-cart/{id}', 'CartController@deleteListItemCart');
    Route::get('save-item-cart/{id}/{quantity}', 'CartController@saveListItemCart');
    Route::get('product-detail/{id}', 'ProductController@detailProduct')->name('client.product_detail');
    Route::get('product-detail/add-to-cart/{id}', 'CartController@addToCart')->name('client.add_cart');
});
