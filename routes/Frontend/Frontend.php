<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::post('/get/states', 'FrontendController@getStates')->name('get.states');
Route::post('/get/cities', 'FrontendController@getCities')->name('get.cities');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });
});

/*
* Show pages
*/
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');

//Product routs
Route::group(['prefix' => 'products', 'middleware' => ['web'], 'namespace' => 'Product'], function () {
    Route::get('{slug}', 'ProductController@show')->name('product.detail');
    Route::get('/', 'ProductController@index')->name('products.list');
});

Route::group(['prefix' => 'cart', 'middleware' => ['web'], 'namespace' => 'Order'], function () {
    Route::post('add-product', 'CartController@addProductToCart')->name('card.add');
    Route::get('checkout', 'CartController@checkOutPage')->name('checkout.page');
    Route::post('remove-item', 'CartController@removeItem')->name('cart.remove.item');
});

Route::group(['prefix' => 'chef', 'middleware' => ['web'], 'namespace' => 'Chef'], function () {
    Route::get('detail/{chefId}', 'ChefController@detail')->name('chef.detail');
    Route::get('dashboard', 'DashboardController@index')->name('chef.dashboard');
    //
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', 'ChefOrderController@index')->name('chef.orders');
        Route::get('chat', 'ChefOrderController@chefOrderChat')->name('chef.order.chat');
    });
    Route::get('products', 'ChefProductController@index')->name('chef.own.products');
});
//Locatin
Route::group(['prefix' => 'location', 'middleware' => ['web'], 'namespace' => 'Location'], function () {
    Route::post('save', 'LocationController@setGlobalUserLocation')->name('session.location.store');
});

Route::group(['prefix' => 'checkout', 'namespace' => 'Order', 'middleware' => ['auth']], function () {
    Route::Post('order', 'OrderController@store')->name('order.checkout');
    Route::get('order-status', 'OrderController@liveStatus')->name('order.live-status');
});