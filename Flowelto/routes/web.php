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

Route::middleware(['auth'])->group(function () {
    Route::middleware(['manager'])->group(function () {
        Route::get('add-flower', 'FlowerController@addView');
        Route::post('add-flower', 'FlowerController@add');
        Route::get('update-flower/{id}', 'FlowerController@updateView');
        Route::post('update-flower/{id}', 'FlowerController@update');
        Route::post('delete-flower/{id}', 'FlowerController@delete');
        
        Route::get('manage-category/', 'CategoryController@manageCategory');
        Route::post('delete-category/{id}', 'CategoryController@delete');
        Route::get('update-category/{id}', 'CategoryController@updateView');
        Route::post('update-category/{id}', 'CategoryController@update');
    });
    Route::middleware(['customer'])->group(function () {
        Route::post('add-to-cart/{id}', 'CartController@add');
        Route::get('cart', 'CartController@index');
        Route::post('update-cart/{id}', 'CartController@update');
        Route::post('checkout', 'CartController@checkout');
        Route::get('transaction-history', 'TransactionController@history');
        Route::get('history-transaction-detail/{id}', 'TransactionController@detail');
    });
    Route::get('change-password', 'UserController@changePasswordView');
    Route::post('change-password', 'UserController@changePassword');
});
Route::get('/', 'HomeController@index');
Route::get('category/{id}', 'CategoryController@index');
Route::get('flower/{id}', 'FlowerController@index');