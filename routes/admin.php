<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
], function() {
    // Login
    Route::group(['middleware' => ['is.login.admin']], function(){
        Route::get('login', 'LoginController@index')->name('login.index');
        Route::post('login', 'LoginController@login')->name('login.handle');
    });
    Route::get('logout', 'LoginController@logout')->name('login.logout');

    // Dashboard
    Route::group(['middleware' => ['check.login.admin']], function(){
        Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

        //brands
        Route::get('brand', 'BrandController@index')->name('brand.index'); // list item
        Route::get('brand/create', 'BrandController@create')->name('brand.create'); // from add
        Route::post('brand/store', 'BrandController@store')->name('brand.store'); // action add
        Route::get('brand/edit/{slug}-{id}', 'BrandController@edit')->name('brand.edit'); // form edit item
        Route::post('brand/update/{id}', 'BrandController@update')->name('brand.update'); // action update
        Route::post('brand/delete', 'BrandController@delete')->name('brand.delete'); // action delete
        Route::post('brand/is-active', 'BrandController@isActive')->name('brand.is.active');
    });
});
