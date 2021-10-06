<?php

# CELEBRITY BOOKING

Route::get('/celebrity/{id}/wishlist', 'User\DashboardController@celebrityWishlist')->name('home.celebrityWishlist');
Route::get('/celebrity/{id}/account', 'Frontend\HomeController@bookingAcount')->name('home.booking');


Route::group(['middleware' => ['UserAuth']], function() {
   
   Route::get('/celebrity/{id}/booking', 'Frontend\HomeController@booking')->name('user.book');
   Route::get('/getting-all-ocassions', 'Frontend\HomeController@getOcassions')->name('user.getOcassions');


   Route::post('/my-booking/{slug}/submit','User\DashboardController@celebrityBooking')->name('user.celebrityBooking');
   Route::post('/add-ocassion','User\DashboardController@addOcassion')->name('user.addOcassion');

   Route::post('/user/raise-refund/{id}/booking', 'User\DashboardController@raiseRefund')->name('user.raiseRefund');
});