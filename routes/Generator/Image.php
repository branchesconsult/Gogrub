<?php
/**
 * Images
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Image'], function () {
        Route::resource('images', 'ImagesController');
        //For Datatable
        Route::post('images/get', 'ImagesTableController')->name('images.get');
    });
    
});