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

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();
Route::group(['namespace' => 'Front'], function () {
    Route::get('signup', 'AuthController@viewRegister')->name('register.client');
    Route::post('signup', 'AuthController@register')->name('register.client');

    Route::get('signin', 'AuthController@viewLogin')->name('login.client');
    Route::post('signin', 'AuthController@login')->name('login.client');
    Route::get('reset/password-client', 'AuthController@resetPassword')->name('reset.password');
    Route::get('send/code', 'AuthController@sendMessage')->name('send.code');
    Route::get('check/code', 'AuthController@checkCode')->name('check.code');
    Route::post('change/password', 'AuthController@changePassword')->name('change.password');

    Route::get('index', 'MainController@index')->name('index');
    Route::get('main', 'MainController@main')->name('main');
    Route::get('filter', 'MainController@viewFilter')->name('filter');
    Route::get('details/product/{id}', 'MainController@detailsProduct')->name('details');


    Route::group(['middleware'=>'client-web'],function () {
        Route::get('profile-client/{id}', 'AuthController@viewProfile')->name('profile.client');
        Route::post('profile-update/{id}', 'AuthController@profile')->name('profile');
        Route::get('myacount', 'AuthController@myAccount')->name('myacount');

        Route::get('contact/client', 'MainController@viewContact')->name('contact.client');
        Route::post('contact/client', 'MainController@contact')->name('contact.client');

        Route::get('cart', 'CartController@index')->name('cart');
        Route::post('add-cart', 'CartController@store');
        Route::get('update-quantity/{product}', 'CartController@update');
        Route::get('empty', 'CartController@empty')->name('empty');
        Route::delete('remove/{product}', 'CartController@destroy');
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('about', 'MainController@about')->name('about');
        Route::get('bank/account', 'MainController@bank')->name('bank');
        Route::get('myorder', 'MainController@myOrder')->name('myorder');
        Route::get('addorder', 'MainController@addOrder')->name('addorder');

        Route::get('auth/{provider}', 'AuthController@redirectToProvider');
        Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback');
    });
});

// routes for admin

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['middleware' => 'auth:web'] , function () {

        Route::resource('product', 'ProductController');
        Route::resource('client', 'ClientController');
//        Route::get('ajaxdata/removedata', 'ClientController@removedata')->name('ajaxdata.removedata');
        Route::get('client/{id}/active', 'ClientController@active');
        Route::get('client/{id}/deactive', 'ClientController@deactive');
        Route::resource('link', 'LinkController');
        Route::resource('contact', 'ContactController');
        Route::resource('category', 'CategoryController');
        Route::resource('order', 'OrderController');
        Route::get('order/{id}/active', 'OrderController@active');
        Route::get('order/{id}/deactive', 'OrderController@deactive');
        Route::get('profile-user/{id}', 'UserController@viewProfileUser')->name('profile.user');
        Route::post('profile-user/{id}', 'UserController@profileUser')->name('profile.user');
        Route::get('change-password', 'UserController@changePasswordView')->name('change.password');
        Route::post('change-password', 'UserController@changePassword')->name('change.password');

        Route::get('logout/admin', 'UserController@logout')->name('logout.admin');

    });
    });