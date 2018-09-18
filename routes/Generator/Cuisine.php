<?php
/**
 * Cuisine
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Cuisine'], function () {
        Route::resource('cuisines', 'CuisinesController');
        //For Datatable
        Route::post('cuisines/get', 'CuisinesTableController')->name('cuisines.get');
    });
    
});