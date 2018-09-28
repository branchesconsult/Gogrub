<?php
/**
 * Devices
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Device'], function () {
        Route::resource('devices', 'DevicesController');
        //For Datatable
        Route::post('devices/get', 'DevicesTableController')->name('devices.get');
    });
    
});