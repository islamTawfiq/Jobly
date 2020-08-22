<?php

// sponsor dashboard
Route::get('edit-profile','editProfileController@edit');
Route::PATCH('edit-profile','editProfileController@update');

Route::get('my-orders','myOrdersController@index');
Route::get('cancel/{id}','myOrdersController@cancel');
Route::get('reject/{id}','myOrdersController@reject');
Route::get('approve/{id}','myOrdersController@approve');
Route::post('notes/{id}','myOrdersController@notes');
Route::post('notes/{nanny_id}/{receiver_id}','myOrdersController@notes');

Route::get('my-package','myPackageController@index');
Route::get('my-payments','myPaymentsController@index');
Route::get('my-notification','inboxController@index');
Route::get('my-notification/{id}','inboxController@destroy');


Route::get('instructions','instructionController@index');






