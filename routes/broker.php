<?php

 // broker dashboard
 Route::get('edit-profile','dashboard\broker\editProfileController@edit');
 Route::PATCH('edit-profile','dashboard\broker\editProfileController@update');

 Route::get('my-cv','dashboard\broker\myCvController@index');
 Route::get('add-cv','dashboard\broker\addCvController@index');
 Route::post('add-cv','dashboard\broker\addCvController@addCv');
 Route::get('client-orders','dashboard\broker\clientOrdersController@index');
 Route::get('reject/{id}','dashboard\broker\clientOrdersController@rejectNanny');
 Route::get('confirm/{id}','dashboard\broker\clientOrdersController@confirmNanny');

 Route::get('interviews','dashboard\broker\interviewsController@index');

 Route::resource('all-cvs','dashboard\broker\allCvController')->except([
      'store', 'show','destroy'
 ]);
 Route::get('all-cvs/{id}', 'dashboard\broker\allCvController@destroy');






