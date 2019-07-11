<?php
    

 Route::group(['namespace' => 'webmuscets\FormManager\Creator\Controllers','prefix' => 'form-manager', 'middleware' => ['web','auth']], function(){

	Route::get('/', 'FormController@index');
	Route::resource('/forms', 'FormController');

	Route::get('/forms/{slug}/attributes', 'AttributeController@index');
	Route::post('/forms/{slug}/attributes', 'AttributeController@update');

    Route::get('/assets/{folder}/{file}', 'AssetController@getAsset');

});
