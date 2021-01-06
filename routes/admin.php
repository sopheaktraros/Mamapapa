<?php

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

	// Security
	Route::get('users.table-data', 'UsersController@getTableData')->name('users.table');
	Route::patch('/users/{id}/remove', 'UsersController@remove')->name('users.remove');
	Route::resource('/users', 'UsersController');

	Route::get('roles.table-data', 'RolesController@getTableData')->name('roles.table');
	Route::patch('/roles/{id}/remove', 'RolesController@remove')->name('roles.remove');
    Route::resource('/roles', 'RolesController');

	// Settings
	Route::patch('/settings', 'SettingsController@update')->name('settings.update');
	Route::get('/settings', 'SettingsController@index')->name('settings.index');

    // Customer
    Route::get('/customers/table-data', 'CustomersController@getTableData')->name('customers.table');
    Route::resource('/customers', 'CustomersController');
    Route::get('customers.dashbord', 'CustomersController@dashboard')->name('customers.dashbord');

    // Slider
    Route::resource('/sliders', 'SlidersController');
    // Home Page
    Route::resource('/home-pages', 'HomePagesController');
    Route::post('update-home-page', 'HomePagesController@updateHomePage');
    // About Us
    Route::resource('/about-us', 'AboutUsController');
    Route::post('update-about-us', 'AboutUsController@updateAboutUs');
   

    // Help Center
	Route::patch('/help-centers', 'HelpCentersController@update')->name('help-centers.update');
    Route::get('/help-centers', 'HelpCentersController@index')->name('help-centers.index');
});

Auth::routes();
