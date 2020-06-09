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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('')->group(function () {
    Route::get('','HomeController@index');
    Route::get('product/no/{id}','HomeController@product');
    Route::get('card/add/product/{id}','HomeController@cart_add_product');
    // Route::get('category','CategoryController@index');
    // Route::post('category/add','CategoryController@store');
    // Route::get('category/show','CategoryController@show');
    // Route::post('category/delete','CategoryController@destroy');
    // Route::post('category/list','CategoryController@list');
    // Route::post('category/edit','CategoryController@edit');
    // Route::post('category/update','CategoryController@update');

    // Route::get('product','ProductController@index');
    // Route::post('product/add','ProductController@store');
    // Route::get('product/show','ProductController@show');
    // Route::post('product/stock','ProductController@stock');
    // Route::post('product/delete','ProductController@destroy');
    // Route::post('product/edit','ProductController@edit');
    // Route::post('product/update','ProductController@update');
    // Route::post('product/img','ProductController@img');
    // Route::post('product/single/img','ProductController@single_img');
    // Route::post('product/img/new/upload','ProductController@img_new_upload');
});


Route::prefix('admin')->group(function () {
    Route::get('',function(){
        return view('admin.home');
    });
    Route::get('category','CategoryController@index');
    Route::post('category/add','CategoryController@store');
    Route::get('category/show','CategoryController@show');
    Route::post('category/delete','CategoryController@destroy');
    Route::post('category/list','CategoryController@list');
    Route::post('category/edit','CategoryController@edit');
    Route::post('category/update','CategoryController@update');

    Route::get('product','ProductController@index');
    Route::post('product/add','ProductController@store');
    Route::get('product/show','ProductController@show');
    Route::post('product/stock','ProductController@stock');
    Route::post('product/delete','ProductController@destroy');
    Route::post('product/edit','ProductController@edit');
    Route::post('product/update','ProductController@update');
    Route::post('product/img','ProductController@img');
    Route::post('product/single/img','ProductController@single_img');
    Route::post('product/img/new/upload','ProductController@img_new_upload');

    Route::get('banner','BannerController@index');
    Route::post('banner/add','BannerController@store');
    Route::get('banner/show','BannerController@show');
    Route::post('banner/delete','BannerController@destroy');
    Route::post('banner/edit','BannerController@edit');
    Route::post('banner/update','BannerController@update');
});