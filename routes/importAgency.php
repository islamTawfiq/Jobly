<?php

// agency dashboard
Route::get('edit-profile','editProfileController@edit');
Route::PATCH('edit-profile','editProfileController@update');
Route::get('my-orders','myOrdersController@index');
Route::get('cancel/{id}','myOrdersController@rejectNanny');

Route::get('interviews','interviewsController@index');
Route::get('cancel/{id}','interviewsController@rejectNanny');
Route::get('aprove/{id}','interviewsController@aproveNanny');






