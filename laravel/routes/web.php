<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('', 'HomeController@index')->name('index');
Route::get('/menu', 'HomeController@menu')->name('menu');

Route::get('/contact-us', 'HomeController@dummy')->name('contact-us');
Route::get('/legal', 'HomeController@dummy')->name('legal');
Route::get('/locations', 'HomeController@dummy')->name('locations');


Route::group(['prefix' => '/user', 'middleware' => 'auth'], function () {
    Route::get('orders', 'UserController@listOrders')->name('orders');
});


Route::group(['prefix' => '/checkout'], function () {
    Route::get('', 'CheckoutController@show')->name('checkout');
    Route::post('', 'CheckoutController@order');
});


Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::group(['prefix' => 'cart'], function () {
            //Route::get('', 'CartController@show');
            // i don't think splitting into post\put\patch worth the trouble
            Route::post('', 'CartController@updateItem');
            Route::put('', 'CartController@updateItem');
            Route::delete('', 'CartController@removeItem');
        });
        Route::post('/toggleCurrency', 'HomeController@toggleCurrency');
    });
});

Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false]);
Route::get('/logout','Auth\LoginController@logout')->name('logout');
