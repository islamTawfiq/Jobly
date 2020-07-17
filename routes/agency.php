<?php

// agency dashboard
Route::get('edit-profile','dashboard\agency\editProfileController@edit');
Route::PATCH('edit-profile','dashboard\agency\editProfileController@update');
Route::get('my-orders','dashboard\agency\myOrdersController@index');
Route::get('cancel/{id}','dashboard\agency\myOrdersController@rejectNanny');

Route::get('interviews','dashboard\agency\interviewsController@index');
Route::get('cancel/{id}','dashboard\agency\interviewsController@rejectNanny');
Route::get('aprove/{id}','dashboard\agency\interviewsController@aproveNanny');






