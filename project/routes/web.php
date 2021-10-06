<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();
Route::get('/command', function () {
	//phpinfo();
   // \Artisan::call('config:clear');
   // \Artisan::call('cache:clear');
  \Artisan::call('migrate');
  // \Artisan::call('make:model Models/EmailTemplate -m');
  // \Artisan::call('make:controller Admin/CelebrityController');
  //\Artisan::call('make:model Models/MySubscription');
});
Route::get('/login', function () {
	return 1;
    return view('auth.login2');
});
 
Route::get('/search', 'Frontend\HomeController@search')->name('home.search');
Route::get('/search-items', 'Frontend\HomeController@searchItem')->name('home.searchItem');
Route::get('/home', 'Frontend\HomeController@index')->name('home2');
Route::get('/{slug}/get-recent-joined-celebrity', 'Frontend\HomeController@recentJoined')->name('home.recentJoined.celebrity');
Route::get('/{slug}/get-all-celebrities/{type}', 'Frontend\HomeController@allCelebrity')->name('home.allCelebrity.celebrity');
Route::get('/{slug}/get-celebrity-detail', 'Frontend\HomeController@celebrityDetail')->name('home.celebrityDetail.celebrity');


Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/about-us', 'Frontend\HomeController@aboutus')->name('about.us');
Route::get('/category', 'Frontend\HomeController@category')->name('category.listing');
Route::get('/FAQs', 'Frontend\HomeController@FAQs')->name('FAQs');
Route::get('/FAQs/{id}/category', 'Frontend\HomeController@FAQs')->name('Category.FAQs');
Route::get('/login', 'Frontend\HomeController@login')->name('home.login');
Route::get('/user/login', 'Frontend\HomeController@login')->name('user.login');
Route::get('/logout', 'HomeController@logout')->name('logout');

Route::post('/ajax/login', 'HomeController@check')->name('ajax.login');


Route::get('/get-celebrity-videos/{slug}/{type}', 'Frontend\HomeController@getCelebrityProfileVideo')->name('home.getCelebrityProfileVideo');


Route::get('/jobs', 'Frontend\HomeController@jobs')->name('home.jobs');
Route::get('/job/{id}/detail', 'Frontend\HomeController@job_detail')->name('home.job.detail');
Route::get('/job/{id}/apply', 'Frontend\HomeController@job_apply')->name('home.job.apply');
Route::post('/job/{id}/apply', 'Frontend\HomeController@post_job_apply')->name('home.job.apply');
Route::get('/contact-us', 'Frontend\HomeController@contactUs')->name('home.contactUs');
Route::get('/seller-detail', 'Frontend\HomeController@sellerDetail')->name('home.sellerDetail');
Route::get('/seller-listing', 'Frontend\HomeController@sellerListing')->name('home.sellerListing');



$slug = \Request::segment(1);
$CmsPage = \App\Models\CmsPage::where('status',1)->where('slug',$slug);
if($CmsPage->count() > 0){
 Route::get($slug, 'Frontend\HomeController@cms')->name($slug);
}

require __DIR__.'/booking.php';
require __DIR__.'/social_login_routes.php';
require __DIR__.'/routes/admin.php';
require __DIR__.'/artists/routes.php';
require __DIR__.'/user/routes.php';




Route::get('/artist/signup', 'RegisterController@index')->name('artist.signup');
Route::get('/artist/login', 'RegisterController@artistLogin')->name('artist.login');
Route::post('/artist/login', 'RegisterController@artistCheck')->name('artist.login');
Route::get('/admin/login', 'RegisterController@adminLogin')->name('admin.login');
Route::post('/admin/login', 'RegisterController@adminCheck')->name('admin.login');
Route::get('/celebrity/{slug}', 'Frontend\HomeController@celebrityList')->name('celebrity.listing');
Route::get('/celebrity/{slug}/detail', 'Frontend\HomeController@celebrityDetails')->name('celebrity.detail');
Route::post('/register/ajax', 'RegisterController@createCelebrity')->name('register.ajax');
Route::post('/register/customer/ajax', 'RegisterController@createUser')->name('register.customer.ajax');
Route::any('/check/auth/validations', 'RegisterController@checkExistEscortFieldold')->name('artist.checkFields');
Route::get('/ajax/get-state-cities','Artist\DashboardController@countries')->name('ajax.countries');


Route::get('/keep-onlined', 'Frontend\HomeController@keepOnlined')->name('celebrity.keepOnlined');

Route::get('/lang/{key}', function ($key) {
	        session()->put('locale', $key);
	        return response()->json(['status' => 1]);
})->name('home.lang');


Route::get('/theme-mode/{key}', function ($key) {
	        if($key == "dark"){
                session()->put('data-theme');
	        }else{
	        	session()->forget('data-theme');
	        }
	        session()->put('data-theme', $key);
	        return response()->json(['status' => 1]);
})->name('home.theme.mode');




