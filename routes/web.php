<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

// Public Routes
Route::group(['namespace' => 'App\Http\Controllers'], function() { 
    Route::post('/login', 'WebAuthController@login');
    Route::post('/logout', 'WebAuthController@logout');

    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'dorms'], function () {
        Route::get('/', 'DormController@index');
        Route::get('/{dorm}', 'DormController@show');
        Route::get('/create-dorm', 'DormController@create');
        Route::get('/{dorm}/edit-dorm', 'DormController@edit');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index');
        Route::get('/{user}', 'UserController@show');
        // Route::get('/', 'UserController@create');
        // Route::get('/{user}', 'UserController@edit');
    });
});

