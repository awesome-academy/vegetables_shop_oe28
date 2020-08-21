<?php

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
    Route::get('lang/{locale}', 'Admins\AdminController@switchLanguage')
        ->name('lang');
});

// Admin

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'Admins\AdminController@getLogin')->name('admin.get_login');
    Route::post('login', 'Admins\AdminController@postLogin')->name('admin.post_login');
        Route::get('logout', 'Admins\AdminController@getLogout')->name('admin.get_logout');
    });
Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin'], function () {
    Route::get('dashboard', 'Admins\AdminController@index')->name('dashboard');
    Route::resource('products', 'Admins\ProductController');
    Route::resource('supliers', 'Admins\SuplierController');
    Route::resource('users', 'Admins\UserController');
    Route::resource('categories', 'Admins\CategoryController');
    Route::resource('roles', 'Admins\RoleController');
    Route::resource('posts', 'Admins\PostController');
});

// Client

Route::group(['namespace' => 'Clients'], function () {
    Route::get('/', 'HomeController@index')->name('client.homepage');
    Route::get('post', 'PostController@index')->name('client.post_index');
    Route::get('product', 'ProductController@index')->name('client.all_product');
    Route::get('introduce', 'HomeController@introduce')->name('client.introduce');
    Route::get('delivery', 'HomeController@delivery')->name('client.delivery');
});
