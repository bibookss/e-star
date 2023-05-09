<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

Route::group(['namespace' => 'App\Http\Controllers'], function() { 
    Route::post('/login', 'WebAuthController@login')->name('login');
    Route::post('/logout', 'WebAuthController@logout')->name('logout');
    Route::post('/register', 'WebAuthController@register')->name('register');
    Route::get('/contacts', 'ContactController@index');
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'dorms'], function () {
        Route::get('/', 'DormController@index')->name('dorms');
        Route::get('/{dorm}', 'DormController@show');
        Route::post('/create-dorm', 'DormController@addDorm')->name('add-dorm');
        // Route::get('/', 'DormController@addDorm')->name('add-dorm');
        // Route::get('/{dorm}/edit-dorm', 'DormController@edit');

        Route::post('/{dorm}/posts', 'PostController@createPost')->name('add-post');
        Route::patch('/posts/{post}', 'PostController@editPost')->name('edit-post');
        Route::delete('/posts/{post}', 'PostController@deletePost')->name('delete-post');
    });

    Route::get('/search', 'DormController@search')->name('search');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'UserController@show')->name('profile');
    });
});

Route::fallback(function () {
    return redirect('/');
});


