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

Route::get('/', [
    'uses'=>'LendingPageController@index',
    'as'=>'index'
]);

// shop
Route::get('/shop', [
    'uses'=>'ShopController@index',
    'as'=>'shop.index'
]);
Route::get('/shop/{product}', [
    'uses'=>'ShopController@show',
    'as'=>'shop.show'
]);
// cart
Route::get('/cart', [
    'uses'=>'CartController@index',
    'as'=>'cart.index'
]);
Route::post('/cart', [
    'uses'=>'CartController@store',
    'as'=>'cart.store'
]);
Route::patch('/cart/{product}', [
    'uses'=>'CartController@update',
    'as'=>'cart.update'
]);
Route::delete('/cart/{product}', [
    'uses'=>'CartController@destroy',
    'as'=>'cart.delete'
]);

Route::post('/cart/switchToSaveForLater/{product}', [
    'uses'=>'CartController@switchToSaveForLater',
    'as'=>'cart.switchToSaveForLater'
]);

Route::delete('/saveforlater/{product}', [
    'uses'=>'CartController@destroysaved',
    'as'=>'cart.destroysaved'
]);
Route::post('/cart/switchToCart/{product}', [
    'uses'=>'CartController@switchToCart',
    'as'=>'cart.switchToCart'
]);

// checkout

Route::get('/checkout',[
    'uses'=>'CheckoutController@index',
    'as'=>'checkout.index'
]);
Route::post('/checkout',[
    'uses'=>'CheckoutController@store',
    'as'=>'checkout.store'
]);
Route::get('/thankyou',[
    'uses'=>'CheckoutController@thanks',
    'as'=>'thankyou.thanks'
]);

// coupons
Route::post('/coupon',[
    'uses'=>'CouponController@store',
    'as'=>'coupon.store'
]);

Route::delete('/coupon',[
    'uses'=>'CouponController@destroy',
    'as'=>'coupon.delete'
]);



Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

