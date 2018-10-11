<?php

/*
 * Settings Management
 */
Route::group(['namespace' => 'Settings'], function () {
    Route::resource('settings', 'SettingsController', ['except' => ['show', 'create', 'save', 'index', 'destroy']]);
    Route::get('settings', 'SettingsController@index')->name('settings.form');
    Route::post('settings', 'SettingsController@update')->name('settings.form.update');
    Route::post('removeicon/{setting}', 'SettingsLogoController@destroy')->name('removeIcon');
});
