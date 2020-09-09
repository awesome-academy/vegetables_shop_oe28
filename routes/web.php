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
    Route::resource('orders', 'OrderController');
    Route::resource('import-bills', 'ImportBillController');
});

// Client
Route::group(['namespace' => 'Clients'], function () {
    Route::get('/', 'HomeController@index')->name('client.homepage');
    Route::get('post', 'PostController@index')->name('client.post_index');
    Route::get('product', 'ProductController@index')->name('client.all_product');
    Route::get('register', 'UserController@register')->name('client.register');
    Route::post('register', 'UserController@postRegister')->name('client.post_register');
    Route::get('login', 'UserController@getLogin')->name('client.get_login');
    Route::post('login', 'UserController@postLogin')->name('client.post_login');
    Route::get('logout', 'UserController@getLogout')->name('client.get_logout');
    Route::get('profile', 'UserController@getProfile')->name('client.get_profile');
    Route::post('profile', 'UserController@postProfile')->name('client.post_profile');
    Route::get('introduce', 'HomeController@introduce')->name('client.introduce');
    Route::get('delivery', 'HomeController@delivery')->name('client.delivery');
    Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('client.add_cart');
    Route::get('delete-item-cart/{id}', 'CartController@deleteItemCart');
    Route::get('view-cart', 'CartController@viewCart')->name('client.view_cart');
    Route::get('delete-list-item-cart/{id}', 'CartController@deleteListItemCart');
    Route::get('save-item-cart/{id}/{quantity}', 'CartController@saveListItemCart');
    Route::get('product-detail/{id}', 'ProductController@detailProduct')->name('client.product_detail');
    Route::get('product-detail/add-to-cart/{id}', 'CartController@addToCart')->name('client.add_cart');
    Route::get('checkout', 'HomeController@getCheckout')->name('client.checkout');
    Route::post('checkout', 'HomeController@postCheckout')->name('client.post_checkout');
    Route::post('register-news', 'UserController@registerNews')->name('client.register_new');
    Route::post('rate', 'ProductController@rate')->name('client.rate');
    Route::get('history-bill', 'UserController@historyBill')->name('client.history_bill');
    Route::post('delete-bill', 'UserController@deleteBill')->name('client.delete_bill');
});
