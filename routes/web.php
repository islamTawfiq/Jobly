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
Route::get('/about-us','Site\pages\aboutUs\aboutUsController@index');
Route::get('/contact-us','Site\pages\contactUs\contactUsController@index');
Route::get('/terms&conditions','Site\pages\terms\termsController@index');

Route::post('/send-emails','Site\help\helpController@help');

Route::get('/countries/getStates', 'Site\countries\CountriesController@getStates');

Route::post('/filter','Site\filter\filterController@filterNanny');
Route::get('/filter','Site\filter\filterController@filter');
Route::get('/profile/{id}','Site\nannyProfile\profileController@index');

Route::group(['middleware' => ['auth']], function () {
    // reservation
    Route::post('/reservation/{id}','Site\nannyProfile\profileController@reservation');
});

Route::get('/login', 'Site\auth\LoginController@ShowLoginPage');
Route::post('/login', 'Site\auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
// Broker Register
Route::get('/broker-register', 'Site\auth\RegisterController@ShowBrokerRegister')->name('brokerRegister');
Route::post('/broker-register', 'Site\auth\RegisterController@BrokerRegister');
// Import Agency Register
Route::get('/import-agency-register', 'Site\auth\RegisterController@ShowImportAgencyRegister')->name('importAgencyRegister');
Route::post('/import-agency-register', 'Site\auth\RegisterController@ImportAgencyRegister');
// Export Agency Register
Route::get('/export-agency-register', 'Site\auth\RegisterController@ShowExportAgencyRegister')->name('exportAgencyRegister');
Route::post('/export-agency-register', 'Site\auth\RegisterController@ExportAgencyRegister');
// Sponsor Register
Route::get('/sponsor-register', 'Site\auth\RegisterController@ShowSponsorRegister')->name('sponsorRegister');
Route::post('/sponsor-register', 'Site\auth\RegisterController@SponsorRegister');
// Verify
// Route::get('/verify', 'Site\auth\verify\verifyController@getVerify')->name('getVerify');
// Route::post('/verify', 'Site\auth\verify\verifyController@postVerify')->name('Verify');
// Route::post('/verify/new-code', 'Site\auth\verify\verifyController@newCode')->name('NewVerify');
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

