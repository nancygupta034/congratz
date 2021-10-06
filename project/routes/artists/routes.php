<?php


 Route::group(['middleware' => ['ArtistAuth'],'prefix' => 'celebrity', 'namespace' => '\App\Http\Controllers\Artist'], function() {
   Route::get('/dashboard','DashboardController@myProfile')->name('artist.dashboard');
   Route::get('/','DashboardController@myProfile')->name('artist.profile');
   Route::get('/edit-my-profile','DashboardController@editProfile')->name('artist.profile.edit');
   Route::post('/edit-my-profile','DashboardController@updateProfile')->name('artist.profile.edit');


   Route::get('/my-settings','DashboardController@Availability')->name('artist.Availability');
   Route::get('/my-availability-ajax','DashboardController@AvailabilityAjax')->name('artist.Availability.ajax');



     Route::get('/my-booking','DashboardController@myBooking')->name('artist.myBooking');
     Route::get('/my-booking/{status}/status','DashboardController@myBookingStatus')->name('artist.myBookingStatus');
     Route::get('/my-booking/ajax','DashboardController@myBookingStatus')->name('artist.myBookingStatus.ajax');

     Route::get('/change-booking/{status}/status/{id}','DashboardController@changeBookingStatus')->name('artist.changeBookingStatus');
     Route::get('/my-booking/{id}/detail','DashboardController@changeBookingDetail')->name('artist.changeBookingDetail');
     Route::post('/booking/{id}/upload/video','DashboardController@bookingUploadVideo')->name('artist.bookingUploadVideo');

     

   Route::get('/my-videos','DashboardController@myvideos')->name('artist.myvideos');
   Route::get('/my-videos/{id}/set-profile-video-settings','DashboardController@myvideoProfileSetting')->name('artist.myvideoProfileSetting');
   Route::get('/my-videos/ajax','DashboardController@myvideosAjax')->name('artist.myvideos.ajax');
   Route::get('/my-videos/{id}/detail','DashboardController@myvideosDetail')->name('artist.myvideos.detail');
   Route::post('/my-videos/{id}/review/{review_id}','DashboardController@myvideosreview')->name('artist.myvideos.review');



    Route::get('/invite-user','DashboardController@inviteUser')->name('artist.inviteUser');
    Route::get('/subscription/list','DashboardController@subscriptionList')->name('artist.subscription.list');
    Route::get('/subscription','DashboardController@subscription')->name('artist.subscription');
    Route::post('/subscription','DashboardController@subscription_post')->name('artist.subscription');
    Route::post('/changePassword','DashboardController@changePassword')->name('artist.changePassword');


});