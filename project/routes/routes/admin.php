<?php



Route::group(['middleware' => ['AdminAuth'], 'prefix' => 'admin'], function() {
   

   Route::get('/','Admin\DashboardController@index')->name('admin.dashboard');
   Route::get('/settings','Admin\DashboardController@index')->name('admin.settings');





#-------------------------------------------------------------------------------------------
# CATEGORY
#-------------------------------------------------------------------------------------------

Route::get('celebrity/listing','Admin\CelebrityController@index')->name('admin.celebrity.list');
Route::any('celebrity/listing/ajax','Admin\CelebrityController@ajax')->name('admin.celebrity.ajax');
Route::any('celebrity/status/{id}/change/{type}','Admin\CelebrityController@statusChnage')->name('admin.celebrity.active');

Route::get('customer/listing','Admin\CustomerController@index')->name('admin.customer.list'); 
Route::any('customer/listing/ajax','Admin\CustomerController@ajax')->name('admin.customer.ajax');
Route::any('customer/status/{id}/change/{type}','Admin\CustomerController@statusChnage')->name('admin.customer.active');


Route::get('booking/{type}/listing','Admin\BookingController@index')->name('admin.booking.list');
Route::any('booking/{type}/listing/ajax','Admin\BookingController@ajax')->name('admin.booking.ajax');

Route::any('booking/status/{id}/change/{type}','Admin\BookingController@statusChnage')->name('admin.booking.active');
Route::any('booking/details/{id}','Admin\BookingController@detail')->name('admin.booking.detail');

#-------------------------------------------------------------------------------------------
# CATEGORY
#-------------------------------------------------------------------------------------------


   Route::get('packages/listing','Admin\PackagesController@index')->name('admin.packages.list');
   Route::get('packages/listing/ajax','Admin\PackagesController@ajax')->name('admin.packages.ajax');
   Route::get('packages/{id}/delete','Admin\PackagesController@delete')->name('admin.packages.delete');
   Route::post('packages/listing','Admin\PackagesController@filter')->name('admin.packages.list');
   Route::get('packages/create','Admin\PackagesController@create')->name('admin.packages.create');
   Route::get('{lang}/packages/{id}/edit','Admin\PackagesController@create')->name('admin.packages.edit');
   Route::post('{lang}/packages/{id}/edit','Admin\PackagesController@store')->name('admin.packages.edit');
   Route::post('packages/create','Admin\PackagesController@store')->name('admin.packages.create');





#-------------------------------------------------------------------------------------------
# CATEGORY
#-------------------------------------------------------------------------------------------


   Route::get('event/listing','Admin\EventController@index')->name('admin.event.list');
   Route::get('event/listing/ajax','Admin\EventController@ajax')->name('admin.event.ajax');
   Route::get('event/{id}/delete','Admin\EventController@delete')->name('admin.event.delete');
   Route::post('event/listing','Admin\EventController@filter')->name('admin.event.list');
   Route::get('event/create','Admin\EventController@create')->name('admin.event.create');
   Route::get('{lang}/event/{id}/edit','Admin\EventController@create')->name('admin.event.edit');
   Route::post('{lang}/event/{id}/edit','Admin\EventController@store')->name('admin.event.edit');
   Route::post('event/create','Admin\EventController@store')->name('admin.event.create');





#-------------------------------------------------------------------------------------------
# CATEGORY
#-------------------------------------------------------------------------------------------


   Route::get('category/listing','Admin\CategoryController@index')->name('admin.category.list');
   Route::get('category/listing/ajax','Admin\CategoryController@ajax')->name('admin.category.ajax');
   Route::get('category/{id}/delete','Admin\CategoryController@delete')->name('admin.category.delete');
   Route::post('category/listing','Admin\CategoryController@filter')->name('admin.category.list');
   Route::get('category/create','Admin\CategoryController@create')->name('admin.category.create');
   Route::get('{lang}/category/{id}/edit','Admin\CategoryController@create')->name('admin.category.edit');
   Route::post('{lang}/category/{id}/edit','Admin\CategoryController@store')->name('admin.category.edit');
   Route::post('category/create','Admin\CategoryController@store')->name('admin.category.create');


Route::get('{lang}/category/{id}/menuLink/{check}','Admin\CategoryController@menuLink')->name('admin.category.menuLink');


#-------------------------------------------------------------------------------------------
# COUNTRY
#-------------------------------------------------------------------------------------------


   Route::get('location/country/listing','Admin\CountryController@index')->name('admin.country.list');
   Route::get('location/country/listing/ajax','Admin\CountryController@ajax')->name('admin.country.ajax');
   Route::get('location/country/{id}/delete','Admin\CountryController@delete')->name('admin.country.delete');
   Route::post('location/country/listing','Admin\CountryController@filter')->name('admin.country.list');
   Route::get('location/country/create','Admin\CountryController@create')->name('admin.country.create');
   Route::get('location/{lang}/country/{id}/edit','Admin\CountryController@create')->name('admin.country.edit');
   Route::post('location/{lang}/country/{id}/edit','Admin\CountryController@store')->name('admin.country.edit');
   Route::post('location/country/create','Admin\CountryController@store')->name('admin.country.create');





#-------------------------------------------------------------------------------------------
# COUNTRY
#-------------------------------------------------------------------------------------------


   Route::get('location/city/listing','Admin\CityController@index')->name('admin.city.list');
   Route::get('location/city/listing/ajax','Admin\CityController@ajax')->name('admin.city.ajax');
   Route::get('location/city/{id}/delete','Admin\CityController@delete')->name('admin.city.delete');
   Route::post('location/city/listing','Admin\CityController@filter')->name('admin.city.list');
   Route::get('location/city/create','Admin\CityController@create')->name('admin.city.create');
   Route::get('location/{lang}/city/{id}/edit','Admin\CityController@create')->name('admin.city.edit');
   Route::post('location/{lang}/city/{id}/edit','Admin\CityController@store')->name('admin.city.edit');
   Route::post('location/city/create','Admin\CityController@store')->name('admin.city.create');




#-------------------------------------------------------------------------------------------
# COUNTRY
#-------------------------------------------------------------------------------------------


   Route::get('location/state/listing','Admin\StateController@index')->name('admin.state.list');
   Route::get('location/state/listing/ajax','Admin\StateController@ajax')->name('admin.state.ajax');
   Route::get('location/state/{id}/delete','Admin\StateController@delete')->name('admin.state.delete');
   Route::post('location/state/listing','Admin\StateController@filter')->name('admin.state.list');
   Route::get('location/state/create','Admin\StateController@create')->name('admin.state.create');
   Route::get('location/{lang}/state/{id}/edit','Admin\StateController@create')->name('admin.state.edit');
   Route::post('location/{lang}/state/{id}/edit','Admin\StateController@store')->name('admin.state.edit');
   Route::post('location/state/create','Admin\StateController@store')->name('admin.state.create');





#-------------------------------------------------------------------------------------------
# CMS Pages
#-------------------------------------------------------------------------------------------

    Route::get('country/listing', 'Admin\LocationController@countryListing')->name('admin.countryListing');
    Route::any('country/new', 'Admin\LocationController@countryNew')->name('admin.countryAdd');
    Route::any('country/edit/{id}', 'Admin\LocationController@countryEdit')->name('admin.countryEdit');
    Route::get('country/delete', 'Admin\LocationController@countryDelete')->name('admin.countryDelete');

    // States Routes
    Route::get('state/listing', 'Admin\LocationController@stateListing')->name('admin.stateListing');
    Route::any('state/new', 'Admin\LocationController@stateNew')->name('admin.stateAdd');
    Route::any('state/edit/{id}', 'Admin\LocationController@stateEdit')->name('admin.stateEdit');
    Route::get('state/delete', 'Admin\LocationController@stateDelete')->name('admin.stateDelete');

    // Cities Routes
    Route::get('city/listing', 'Admin\LocationController@cityListing')->name('admin.cityListing');
    Route::any('city/new', 'Admin\LocationController@cityNew')->name('admin.cityAdd');
    Route::any('city/edit/{id}', 'Admin\LocationController@cityEdit')->name('admin.cityEdit');
    Route::get('city/delete', 'Admin\LocationController@cityDelete')->name('admin.cityDelete');




#-------------------------------------------------------------------------------------------
# CMS Pages
#-------------------------------------------------------------------------------------------

Route::get('/cms-pages','Admin\CmsPageController@index')->name('admin.cms');
Route::post('/cms-pages','Admin\CmsPageController@filter')->name('admin.cms');
Route::get('/cms-pages-ajax','Admin\CmsPageController@ajax')->name('admin.cms.ajax');
Route::get('/{lang}/cms-page/{id}/edit','Admin\CmsPageController@create')->name('admin.cms.edit');
Route::post('/{lang}/cms-page/{id}/edit','Admin\CmsPageController@store')->name('admin.cms.edit');
Route::get('/cms-page/create','Admin\CmsPageController@create')->name('admin.cms.add');
Route::post('/cms-page/create','Admin\CmsPageController@store')->name('admin.cms.add');
Route::get('cmd/{id}/delete','Admin\CmsPageController@delete')->name('admin.cmd.delete');

#-------------------------------------------------------------------------------------------
# FAQs
#-------------------------------------------------------------------------------------------

Route::get('/jobs','Admin\JobOfferController@index')->name('admin.jobs');
Route::post('/jobs','Admin\JobOfferController@filter')->name('admin.jobs');
Route::get('/jobs/ajax','Admin\JobOfferController@ajax')->name('admin.jobs.ajax');
Route::get('/jobs/create','Admin\JobOfferController@create')->name('admin.jobs.create');
Route::post('/jobs/create','Admin\JobOfferController@store')->name('admin.jobs.create');
Route::get('jobs/{id}/delete','Admin\JobOfferController@delete')->name('admin.jobs.delete');
Route::get('{lang}/jobs/{id}/edit','Admin\JobOfferController@create')->name('admin.jobs.edit');
Route::post('{lang}/jobs/{id}/edit','Admin\JobOfferController@store')->name('admin.jobs.edit');
 
#-------------------------------------------------------------------------------------------
# FAQs
#-------------------------------------------------------------------------------------------

Route::get('/FAQs','Admin\FAQsController@index')->name('admin.FAQs');
Route::post('/FAQs','Admin\FAQsController@filter')->name('admin.FAQs');
Route::get('FAQs/listing/ajax','Admin\FAQsController@ajax')->name('admin.FAQs.ajax');
Route::get('FAQs/create','Admin\FAQsController@create')->name('admin.FAQs.create');
Route::get('FAQs/category','Admin\FAQsController@category')->name('admin.FAQs.category');
Route::post('FAQs/create','Admin\FAQsController@store')->name('admin.FAQs.create');
Route::post('FAQs/{id}/delete','Admin\FAQsController@delete')->name('admin.FAQs.delete');
Route::get('{lang}/FAQs/{id}/edit','Admin\FAQsController@create')->name('admin.FAQs.edit');
Route::post('{lang}/FAQs/{id}/edit','Admin\FAQsController@store')->name('admin.FAQs.edit');


Route::get('{lang}/FAQs/{id}/edit/category','Admin\FAQsController@category')->name('admin.FAQs.edit.category');
Route::post('{lang}/FAQs/{id}/edit/category','Admin\FAQsController@store')->name('admin.FAQs.edit.category');
#-------------------------------------------------------------------------------------------
# Websettings
#-------------------------------------------------------------------------------------------

   Route::get('email-template/listing','Admin\EmailTemplateController@index')->name('admin.emailTemplate.list');
   Route::get('email-template/listing/ajax','Admin\EmailTemplateController@ajax')->name('admin.emailTemplate.ajax');
   Route::get('email-template/{id}/delete','Admin\EmailTemplateController@delete')->name('admin.emailTemplate.delete');
   Route::post('email-template/listing','Admin\EmailTemplateController@filter')->name('admin.emailTemplate.list');
   Route::get('email-template/create','Admin\EmailTemplateController@create')->name('admin.emailTemplate.create');
   Route::get('{lang}/email-template/{id}/edit','Admin\EmailTemplateController@create')->name('admin.emailTemplate.edit');
   Route::post('{lang}/email-template/{id}/edit','Admin\EmailTemplateController@store')->name('admin.emailTemplate.edit');
   Route::post('email-template/create','Admin\EmailTemplateController@store')->name('admin.emailTemplate.create');
// Route::get('/email-template','Admin\EmailTemplateController@index')->name('admin.emailTemplate.list');#-------------------------------------------------------------------------------------------
# Websettings
#-------------------------------------------------------------------------------------------

Route::get('/website-settings','Admin\WebsiteSettingController@index')->name('admin.website.settings');
Route::get('/website-settings/{type}','Admin\WebsiteSettingController@add')->name('admin.website.settings.add');
Route::post('/website-settings','Admin\WebsiteSettingController@store')->name('admin.website.settings.store');
Route::post('/website-settings/{lang}','Admin\WebsiteSettingController@store')->name('admin.website.settings.store.lang');

Route::get('/{lang}/website-settings/{type}','Admin\WebsiteSettingController@add')->name('admin.website.settings.lang.add');

#-------------------------------------------------------------------------------------------
# Testimonials
#-------------------------------------------------------------------------------------------

Route::get('/global/settings','Admin\WebsiteSettingController@globalSettings')->name('admin.website.globalSettings');
Route::get('/global/languages/settings','Admin\WebsiteSettingController@languages')->name('admin.website.languages');
Route::post('/global/languages/settings','Admin\WebsiteSettingController@languageAjax')->name('admin.website.languages');
 
Route::get('/global/languages/settings/create','Admin\WebsiteSettingController@languageCreate')->name('admin.website.languages.create');
Route::post('/global/languages/settings/create','Admin\WebsiteSettingController@languageStore')->name('admin.website.languages.create');

Route::get('/global/languages/settings/{id}/edit','Admin\WebsiteSettingController@languageCreate')->name('admin.website.languages.edit');
Route::post('/global/languages/settings/{id}/edit','Admin\WebsiteSettingController@languageStore')->name('admin.website.languages.edit');

#-------------------------------------------------------------------------------------------
# Testimonials
#-------------------------------------------------------------------------------------------

 
Route::get('/testimonials','Admin\WebsiteSettingController@testimonials')->name('admin.website.testimonials');
Route::post('/testimonials','Admin\WebsiteSettingController@filter')->name('admin.website.testimonials');
Route::get('/testimonials/listing','Admin\WebsiteSettingController@testimonialAjax')->name('admin.website.testimonials.ajax');
Route::get('/testimonials/create','Admin\WebsiteSettingController@testimonialCreate')->name('admin.website.testimonials.create');
Route::post('/testimonials/create','Admin\WebsiteSettingController@testimonialStore')->name('admin.website.testimonials.create');

Route::get('/{lang}/testimonials/{id}/edit','Admin\WebsiteSettingController@testimonialCreate')->name('admin.website.testimonials.edit');
Route::post('/{lang}/testimonials/{id}/edit','Admin\WebsiteSettingController@testimonialStore')->name('admin.website.testimonials.edit');
Route::get('/testimonials/{id}/delete','Admin\WebsiteSettingController@testimonialditDelete')->name('admin.website.testimonials.delete');


});