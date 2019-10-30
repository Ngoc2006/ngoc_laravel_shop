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
    'prefix' => 'admin',
    'middleware' => 'auth'
], function (){
    // Trang dashboard - trang chủ admin
    Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
    // Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'ProductController@index')->name('backend.product.index');
        Route::get('/create', 'ProductController@create')->name('backend.product.create');
        Route::get('/show/{id}', 'ProductController@show')->name('backend.product.show');
        Route::post('/', 'ProductController@store')->name('backend.product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('backend.product.edit');
        Route::put('/{id}', 'ProductController@update')->name('backend.product.update');
        Route::delete('/destroy/{id}', 'ProductController@destroy')->name('backend.product.destroy');
    });
    //Quản lý người dùng
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
        Route::get('/show/{id}', 'UserController@show')->name('backend.user.show');
        Route::post('/', 'UserController@store')->name('backend.user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('backend.user.edit');
        Route::put('/{id}', 'UserController@update')->name('backend.user.update');
        Route::delete('/destroy/{id}', 'UserController@destroy')->name('backend.user.destroy');
    });
    //Quản lý danh mục sản phẩm
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'CategoryController@index')->name('backend.category.index');
        Route::get('/create', 'CategoryController@create')->name('backend.category.create');
        Route::post('/', 'CategoryController@store')->name('backend.category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('backend.category.edit');
        Route::put('/{id}', 'CategoryController@update')->name('backend.category.update');
        Route::delete('/destroy/{id}', 'CategoryController@destroy')->name('backend.category.destroy');
    });
});

Route::group([
    'namespace' => 'Frontend',
    'prefix' => 'online',
    
], function (){
    Route::get('/index', 'IndexController@index')->name('frontend.index');
    Route::group(['prefix' => 'products'], function(){
       Route::get('/', 'ProductController@index')->name('frontend.product.index');
    //    Route::get('/create', 'ProductController@create')->name('frontend.product.create');
       
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

//laravel tao duong dan
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/edit/{product}', function (\App\Models\Product $product){
//     dd(1);
//     return view('backend.products.edit');
// })->middleware('can:update,product');