<?php
/**
 * Locations
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Location'], function () {
        Route::resource('locations', 'LocationsController');
        //For Datatable
        Route::post('locations/get', 'LocationsTableController')->name('locations.get');
    });
    
});