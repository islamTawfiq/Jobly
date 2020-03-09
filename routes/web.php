<?php

/*
|--------------------------------------------------------------------------
| Start Admin Login Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', 'Admin\auth\AuthController@login');

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
Route::get('/', function () {
    return view('site.home.index');
});
Route::get('/filter', function () {
    return view('site.filter.filter');
});


Route::get('/login', 'site\auth\LoginController@ShowLoginPage');
Route::post('/login', 'Auth\LoginController@login')->name('login');
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/broker-register', 'site\auth\RegisterController@ShowRegisterPage')->name('brokerRegister');
// Route::post('/salon-register', 'site\auth\RegisterController@salonRegister');
// Route::post('/client-register', 'site\auth\RegisterController@clientRegister');
// Route::get('/forgot-password', 'Admin\auth\AuthController@forgotPassword');



Route::get('/about-us','site\pages\aboutUs\aboutUsController@index');
Route::get('/contact-us','site\pages\contactUs\contactUsController@index');



