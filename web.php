<?php

Route::get('admin/password/email','AdminController@getResetAdminPassword')->name('password.reset');
Route::post('admin/password/email','AdminController@postResetAdminPassword')->name('password.reset');
Route::get('admin/resetPassword/{email}/{verificationLink}','AdminController@resetPassword');
Route::post('admin/resetPassword','AdminController@newPassword');



