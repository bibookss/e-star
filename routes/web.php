<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

// Public Routes
Route::group(['namespace' => 'App\Http\Controllers'], function() { 
    Route::post('/login', 'WebAuthController@login')->name('login');
    Route::post('/logout', 'WebAuthController@logout')->name('logout');
    Route::post('/register', 'WebAuthController@register')->name('register');
    // dummy controller dahil di ko gets pinagagwa diyan
    Route::get('/contacts', 'ContactController@index');
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'dorms'], function () {
        Route::get('/', 'DormController@index');
        Route::get('/{dorm}', 'DormController@show');
        Route::post('/create-dorm', 'DormController@addDorm')->name('add-dorm');
        // Route::get('/', 'DormController@addDorm')->name('add-dorm');
        Route::get('/{dorm}/edit-dorm', 'DormController@edit');
    });

    Route::get('/search', 'DormController@search')->name('search');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'UserController@show')->name('profile');
    });
});

