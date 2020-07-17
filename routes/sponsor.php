<?php

// sponsor dashboard
Route::get('edit-profile','dashboard\sponsor\editProfileController@edit');
Route::PATCH('edit-profile','dashboard\sponsor\editProfileController@update');
Route::get('my-orders','dashboard\sponsor\myOrdersController@index');
Route::get('reject/{id}','dashboard\sponsor\myOrdersController@rejectNanny');







