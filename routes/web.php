<?php

/*
|--------------------------------------------------------------------------
| Start Admin Login Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', 'Admin\auth\AuthController@login');
Route::post('/admin/login', 'Admin\auth\AuthController@doLogin')->name('doLogin');



Route::get('/', function () {
    return view('site.home.index');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/filter', function () {
        return view('site.filter.filter');
    });
    // pages
    Route::get('/about-us','site\pages\aboutUs\aboutUsController@index');
    Route::get('/contact-us','site\pages\contactUs\contactUsController@index');
    Route::get('/terms&conditions','site\pages\terms\termsController@index');
});


Route::get('/login', 'site\auth\LoginController@ShowLoginPage');
Route::post('/login', 'site\auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/broker-register', 'site\auth\RegisterController@ShowBrokerRegister')->name('brokerRegister');
Route::post('/broker-register', 'site\auth\RegisterController@BrokerRegister');
// Route::post('/client-register', 'site\auth\RegisterController@clientRegister');
// Route::get('/forgot-password', 'Admin\auth\AuthController@forgotPassword');





Route::get('/clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    dd('Done');
});

Route::get('/createStorage', function () {
    Artisan::call('storage:link');
});

