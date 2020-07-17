<?php

/*
|--------------------------------------------------------------------------
| Start Admin Login Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', 'Admin\auth\AuthController@login');
Route::post('/admin/login', 'Admin\auth\AuthController@doLogin')->name('doLogin');

// pages
Route::get('/','HomeController@index');
Route::get('/about-us','site\pages\aboutUs\aboutUsController@index');
Route::get('/contact-us','site\pages\contactUs\contactUsController@index');
Route::get('/terms&conditions','site\pages\terms\termsController@index');

Route::get('/countries/getStates', 'Site\countries\CountriesController@getStates');

Route::group(['middleware' => ['auth']], function () {

    Route::post('/filter','site\filter\filterController@filterNanny');
    Route::get('/filter','site\filter\filterController@filter');
    Route::get('/profile/{id}','site\nannyProfile\profileController@index');
    // reservation
    Route::post('/reservation/{id}','site\nannyProfile\profileController@reservation');

});

Route::get('/login', 'site\auth\LoginController@ShowLoginPage');
Route::post('/login', 'site\auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
// Broker Register
Route::get('/broker-register', 'site\auth\RegisterController@ShowBrokerRegister')->name('brokerRegister');
Route::post('/broker-register', 'site\auth\RegisterController@BrokerRegister');
// Agency Register
Route::get('/agency-register', 'site\auth\RegisterController@ShowAgencyRegister')->name('agencyRegister');
Route::post('/agency-register', 'site\auth\RegisterController@AgencyRegister');
// Sponsor Register
Route::get('/sponsor-register', 'site\auth\RegisterController@ShowSponsorRegister')->name('sponsorRegister');
Route::post('/sponsor-register', 'site\auth\RegisterController@SponsorRegister');
// Verify
// Route::get('/verify', 'site\auth\verify\verifyController@getVerify')->name('getVerify');
// Route::post('/verify', 'site\auth\verify\verifyController@postVerify')->name('Verify');
// Route::post('/verify/new-code', 'site\auth\verify\verifyController@newCode')->name('NewVerify');
// clear
Route::get('/clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    // Artisan::call('route:cache');
    dd('Done');
});

Route::get('/createStorage', function () {
    Artisan::call('storage:link');
});

