<?php
/**
 * Orderstatuses
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Orderstatus'], function () {
        Route::resource('orderstatuses', 'OrderstatusesController');
        //For Datatable
        Route::post('orderstatuses/get', 'OrderstatusesTableController')->name('orderstatuses.get');
    });
    
});