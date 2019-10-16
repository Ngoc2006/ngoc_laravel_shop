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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin'
], function(){
    Route::get('/dashboard','DashboardController@index')->name('backend.dashboard');
});
Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin'
], function (){
    // Trang dashboard - trang chủ admin
    Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
    // Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
       Route::get('/', 'ProductController@index')->name('backend.product.index');
       Route::get('/create', 'ProductController@create')->name('backend.product.create');
    });
});

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin'
], function (){
    // Trang dashboard - trang chủ admin
    Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
    // Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
       Route::get('/', 'ProductController@index')->name('backend.product.index');
       Route::get('/create', 'ProductController@create')->name('backend.product.create');
    });
    //Quản lý người dùng
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
    });
    //Quản lý danh mục sản phẩm
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'CategoryController@index')->name('backend.category.index');
        Route::get('/create', 'CategoryController@create')->name('backend.category.create');
    });
});

Route::group([
    'namespace' => 'Frontend',
    'prefix' => 'online'
], function (){
    Route::get('/index', 'IndexController@index')->name('frontend.index');
    Route::group(['prefix' => 'products'], function(){
       Route::get('/', 'ProductController@index')->name('frontend.product.index');
    });
    Route::group(['prefix' => 'shop'], function(){
        Route::get('/', 'ShopController@index')->name('frontend.shop.index');
    });
    //Quản lý danh mục sản phẩm 
    Route::group(['prefix' => 'cart'], function(){
        Route::get('/', 'CartController@index')->name('frontend.cart.index');
    });
    Route::group(['prefix' => 'contact'], function(){
        Route::get('/', 'ContactController@index')->name('contact.index');
    });
});