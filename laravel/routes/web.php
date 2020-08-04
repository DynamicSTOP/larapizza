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

Route::get('/', 'Controller@index')->name('index');

Route::group(['prefix'=>'/checkout'], function(){
    Route::get('', 'CheckoutController@show')->name('checkout');
    Route::post('', 'CheckoutController@order');
});



Route::group(['prefix'=>'api'], function(){
    Route::group(['prefix'=>'v1'], function(){
        Route::group(['prefix'=>'cart'], function(){
            Route::get('', 'Cart@show');
            // i don't think splitting into post\put\patch worth the trouble
            Route::post('', 'Cart@addItem');
            Route::delete('', 'Cart@removeItem');
        });
        Route::post('/toggleCurrency', 'Controller@toggleCurrency');
    });
});
