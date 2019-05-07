<?php
    

 Route::group(['namespace' => 'webmuscets\FormManager\Creator\Controllers','prefix' => 'form-manager', 'middleware' => ['auth']], function(){

	Route::get('/', 'FormController@index');
	Route::resource('/forms', 'FormController');

	Route::get('/forms/{id}/attributes', 'AttributeController@index');
	Route::post('/forms/{id}/attributes', 'AttributeController@update');

    Route::get('/assets/{folder}/{file}', 'AssetController@getAsset');

});
