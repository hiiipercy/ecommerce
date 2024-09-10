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

Auth::routes([
    'password.confirm' => false, // 404 disabled
    'password.email'   => false, // 404 disabled
    'password.request' => false, // 404 disabled
    'password.reset'   => false, // 404 disabled
    'register'         => false, // 404 disabled
]);

    // Dashboard Route
    Route::get('/','FrontendController@index')->name('index');
    Route::get('/product','FrontendController@product')->name('product');
    Route::get('/product_details/{id}','FrontendController@product_details')->name('product_details');
    Route::get('/blog','FrontendController@blog')->name('blog');
    Route::get('/review','FrontendController@review')->name('review');
    // Route::post('/add_to_cart','CartController@updateOrStore')->name('update-or-store');


Route::group(['as'=>'app.','prefix'=>'panel/','middleware'=>['auth']],function(){
        Route::get('/home', 'HomeController@index')->name('home');
        // Dashboard Route
        Route::get('/admin','backendController@index')->name('index');

        // User Routes
        Route::group(['as'=>'user.','prefix'=>'user/'], function(){
            Route::get('/','UserController@index')->name('index');
            Route::post('update-or-store','UserController@updateOrStore')->name('update-or-store');
            Route::post('edit','UserController@edit')->name('edit');
            Route::post('delete','UserController@delete')->name('delete');
            Route::post('bulk-delete','UserController@bulkDelete')->name('bulk-delete');
            Route::post('status-change','UserController@statusChange')->name('status-change');
        });


        // Product Routes
        Route::group(['as'=>'product.','prefix'=>'product/'], function(){
            Route::get('/','ProductController@index')->name('index');
            Route::post('update-or-store','ProductController@updateOrStore')->name('update-or-store');
            Route::post('edit','ProductController@edit')->name('edit');
            Route::post('delete','ProductController@delete')->name('delete');
            Route::post('bulk-delete','ProductController@bulkDelete')->name('bulk-delete');
            Route::post('status-change','ProductController@statusChange')->name('status-change');
        });

           // Category Routes
           Route::group(['as'=>'category.','prefix'=>'category/'], function(){
            Route::get('/','CategoryController@index')->name('index');
            Route::post('update-or-store','CategoryController@updateOrStore')->name('update-or-store');
            Route::post('edit','CategoryController@edit')->name('edit');
            Route::post('delete','CategoryController@delete')->name('delete');
            Route::post('bulk-delete','CategoryController@bulkDelete')->name('bulk-delete');
            Route::post('status-change','CategoryController@statusChange')->name('status-change');
        });

            // Cart Routes
            Route::group(['as'=>'cart.','prefix'=>'cart/'], function(){
            Route::get('/','CartController@index')->name('index');
            Route::post('update-or-store','CartController@updateOrStore')->name('update-or-store');
            Route::post('edit','CartController@edit')->name('edit');
            Route::post('delete','CartController@delete')->name('delete');
            Route::post('bulk-delete','CartController@bulkDelete')->name('bulk-delete');
            Route::post('status-change','CartController@statusChange')->name('status-change');
        });

            // Review Routes
            Route::group(['as'=>'review.','prefix'=>'review/'], function(){
            Route::get('/','ReviewController@index')->name('index');
            Route::post('update-or-store','ReviewController@updateOrStore')->name('update-or-store');
            Route::post('edit','ReviewController@edit')->name('edit');
            Route::post('delete','ReviewController@delete')->name('delete');
            Route::post('bulk-delete','ReviewController@bulkDelete')->name('bulk-delete');
            Route::post('status-change','ReviewController@statusChange')->name('status-change');
        });

            // Profile Routes
            Route::get('my-profile', 'ProfileController@my_profile')->name('profile.index');
            Route::post('my-profile/update', 'ProfileController@my_profile_update')->name('profile.update');
            Route::post('password-update', 'ProfileController@change_password')->name('password.update');
   

});

Auth::routes();


