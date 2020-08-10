<?php
/*
|--------------------------------------------------------------------------
| Auth  Routes
|--------------------------------------------------------------------------
*/
Route::get('/user/edit','auth\AuthController@edit');
Route::post('/user/edit','auth\AuthController@update');
/*
|--------------------------------------------------------------------------
| Theme Cookie Routes
|--------------------------------------------------------------------------
*/
Route::post('/theme_layout','cookie\ThemeCookieController@themeLayout');
Route::post('/theme_nav_bar_color','cookie\ThemeCookieController@navBarColor');
Route::post('/theme_footer_type','cookie\ThemeCookieController@footerType');
Route::post('/theme_nav_bar_type','cookie\ThemeCookieController@navBarType');
Route::post('/theme_sidebar_switch','cookie\ThemeCookieController@sidebarSwitch');
Route::post('/theme_scroll_top','cookie\ThemeCookieController@scrollTop');
Route::post('/theme_color','cookie\ThemeCookieController@themeColor');
/*
|--------------------------------------------------------------------------
| Resources Routes
|--------------------------------------------------------------------------
*/
Route::resource('admin-groups','users\admins\AdminGroupsController');

Route::resource('admins','users\admins\AdminsController');
Route::resource('export-agencies','users\agencies\exportAgenciesController');
Route::resource('import-agencies','users\agencies\importAgenciesController');
Route::resource('brokers','users\brokers\BrokersController');
Route::resource('sponsors','users\sponsors\SponsorsController');

Route::post('/export-agencies/change-status','users\agencies\exportAgenciesController@ChangeStatus');
Route::post('/import-agencies/change-status','users\agencies\importAgenciesController@ChangeStatus');
Route::post('/brokers/change-status','users\brokers\BrokersController@ChangeStatus');
Route::post('/sponsors/change-status','users\sponsors\SponsorsController@ChangeStatus');

Route::resource('settings','settings\SettingsController');
Route::resource('nannies','nannies\NanniesController');
Route::resource('skills','skills\SkillsController');
Route::resource('jobs','jobs\JobsController');
Route::resource('countries','countries\CountriesController');
Route::resource('importing-countries','countries\ImportingCountriesController');
Route::resource('help','help\helpController');

Route::get('about-us','pages\aboutUs\aboutUsController@index');
Route::PATCH('about-us','pages\aboutUs\aboutUsController@update');

Route::get('contact-us','pages\contactUs\contactUsController@index');
Route::PATCH('contact-us','pages\contactUs\contactUsController@update');

Route::get('terms&conditions','pages\terms\termsController@index');
Route::PATCH('terms&conditions','pages\terms\termsController@update');
/*
|--------------------------------------------------------------------------
| views Routes
|--------------------------------------------------------------------------
*/
Route::get('/','IndexController@index');
Route::get('/icons-font-awesome','icons\IconController@iconsFontAwesome');
Route::get('/icons-feather','icons\IconController@iconsFeather');
Route::get('/inputs','IndexController@inputsExamples');
Route::get('/analytics','IndexController@analyticsExample');




