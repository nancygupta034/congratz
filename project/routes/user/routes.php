<?php

Route::group(['middleware' => ['UserAuth'],'prefix' => 'customer', 'namespace' => '\App\Http\Controllers\User'], function() {
   Route::get('/','DashboardController@myProfile')->name('user.dashboard');
   Route::get('/my-profile','DashboardController@myProfile')->name('user.profile');
   Route::get('/edit-my-profile','DashboardController@editProfile')->name('user.profile.edit');
   Route::post('/edit-my-profile','DashboardController@updateProfile')->name('user.profile.edit');
   Route::post('/update-image','DashboardController@updateImage')->name('user.image.edit');


   Route::get('/my-availability','DashboardController@Availability')->name('user.Availability');
   Route::get('/my-availability-ajax','DashboardController@AvailabilityAjax')->name('user.Availability.ajax');

 
   Route::get('/my-booking','DashboardController@myBooking')->name('user.myBooking');
   Route::get('/my-booking/ajax','DashboardController@myBookingAjax')->name('user.myBookingStatus.ajax');
   Route::get('/my-booking/{id}/detail','DashboardController@myBookingDetail')->name('user.myBookingStatus.detail');
   Route::get('/my-booking/{id}/{status}/status','DashboardController@changeBookingStatus')->name('user.myBookingStatus.Status');

   Route::get('/my-wishlist','DashboardController@mywishlist')->name('user.mywishlist');



   Route::get('/my-videos','DashboardController@myvideos')->name('user.myvideos');
   Route::get('/my-videos/ajax','DashboardController@myvideosAjax')->name('user.myvideos.ajax');
   Route::get('/my-videos/{id}/detail','DashboardController@myvideosDetail')->name('user.myvideos.detail');
   Route::post('/my-videos/{id}/review','DashboardController@myvideosreview')->name('user.myvideos.review');



   Route::get('/invite-user','DashboardController@inviteUser')->name('user.inviteUser');
   Route::get('/settings','DashboardController@settings')->name('user.settings');
   Route::post('/changePassword','DashboardController@changePassword')->name('user.changePassword');
});