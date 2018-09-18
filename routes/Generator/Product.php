<?php
/**
 * Products
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Product'], function () {
        Route::resource('products', 'ProductsController');
        //For Datatable
        Route::post('products/get', 'ProductsTableController')->name('products.get');
    });
    
});