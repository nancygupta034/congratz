<?php




Route::get('auth/{socialType}/login', 'Auth\SocialLoginController@redirectToSocialLogin')->name('auth.social.media');
Route::get('auth/{socialType}/callback', 'Auth\SocialLoginController@handleSocialLoginCallback');


?>