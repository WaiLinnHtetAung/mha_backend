<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {

});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function() {
    //zones
    Route::resource('zones', 'ZonesController');

    //hotels
    Route::get('/hotelsBySubzone', 'HotelsController@hotelsBySubzone');
    Route::resource('hotels', 'HotelsController');
});
