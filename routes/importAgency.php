<?php

// agency dashboard
Route::get('edit-profile','editProfileController@edit');
Route::PATCH('edit-profile','editProfileController@update');
Route::get('my-orders','myOrdersController@index');
Route::get('my-package','myPackageController@index');
Route::get('my-payments','myPaymentsController@index');
Route::get('cancel/{id}','myOrdersController@rejectNanny');

Route::get('cancel/{id}','interviewsController@rejectNanny');
Route::get('aprove/{id}','interviewsController@aproveNanny');






