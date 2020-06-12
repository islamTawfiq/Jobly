<?php

// agency dashboard
Route::get('edit-profile','dashboard\agency\editProfileController@edit');
Route::PATCH('edit-profile','dashboard\agency\editProfileController@update');
Route::get('my-orders','dashboard\agency\myOrdersController@index');






