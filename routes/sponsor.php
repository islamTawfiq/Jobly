<?php

// sponsor dashboard
Route::get('edit-profile','editProfileController@edit');
Route::PATCH('edit-profile','editProfileController@update');

Route::get('my-orders','myOrdersController@index');
Route::get('cancel/{id}','myOrdersController@rejectNanny');
Route::post('notes/{id}','myOrdersController@notes');

Route::get('my-package','myPackageController@index');
Route::get('my-payments','myPaymentsController@index');

Route::get('instructions','instructionController@index');








