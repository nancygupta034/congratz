<?php



Route::group(['middleware' => ['AdminAuth'], 'prefix' => 'api','namespace' => 'Api\Admin'], function() {
   
   Route::post('category/store','CategoryController@store')->name('api.category.store');
   Route::get('category/listing','CategoryController@listing')->name('api.category.listing');
 
 
});