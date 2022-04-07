<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'admin.',
    'namespace' => 'Admin',
], function() {
    // Login
    Route::group(['middleware' => ['is.login.admin']], function(){
        Route::get('login', 'LoginController@index')->name('login.index');
        Route::post('handle-login', 'LoginController@handleLogin')->name('handle.login');
    });
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Dashboard
    Route::group(['middleware' => ['check.login.admin']], function(){
        Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

        //brands
        
    });
});
