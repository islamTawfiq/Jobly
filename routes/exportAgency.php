<?php

 // broker dashboard
 Route::get('edit-profile','editProfileController@edit');
 Route::PATCH('edit-profile','editProfileController@update');

 Route::get('my-cv','myCvController@index');
 Route::get('add-cv','addCvController@index');
 Route::post('add-cv','addCvController@addCv');
 Route::get('client-orders','clientOrdersController@index');
 Route::get('reject/{id}','clientOrdersController@rejectNanny');
 Route::get('confirm/{id}','clientOrdersController@confirmNanny');

 Route::resource('all-cvs','allCvController')->except([
      'store', 'show','destroy'
 ]);
 Route::get('all-cvs/{id}', 'allCvController@destroy');

 Route::get('my-payments','myPaymentsController@index');
 Route::get('my-notification','inboxController@index');







