<?php

 // broker dashboard
 Route::get('edit-profile','editProfileController@edit');
 Route::PATCH('edit-profile','editProfileController@update');

 Route::get('my-cv','myCvController@index');
 Route::get('add-cv','addCvController@index');
 Route::post('add-cv','addCvController@addCv');
 Route::get('client-orders','clientOrdersController@index');
 Route::get('reject-request/{id}','clientOrdersController@rejectInterview');
 Route::get('confirm/{id}','clientOrdersController@confirmInterview');
 Route::post('notes/{nanny_id}/{receiver_id}','clientOrdersController@notes');

 Route::resource('all-cvs','allCvController')->except([
     'store', 'show','destroy'
 ]);
 Route::get('all-cvs/{id}', 'allCvController@destroy');

 Route::get('my-payments','myPaymentsController@index');

 Route::get('my-notification','inboxController@index');
 Route::get('my-notification/{id}','inboxController@destroy');

 Route::get('instructions','instructionController@index');





