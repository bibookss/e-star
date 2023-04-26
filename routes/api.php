<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Public Routes
Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::post('/register', 'AuthController@createUser');
    Route::post('/login', 'AuthController@loginUser');
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() { 
    Route::group(['prefix' => 'dorms'], function () {
        Route::get('/', 'DormController@getAllDorms');
        Route::get('/{dorm}', 'DormController@getDorm');
    });
    Route::group(['prefix' => 'locations'], function () {
        Route::get('/', 'LocationController@getAllLocations');
        Route::get('/{location}', 'LocationController@getLocation');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostController@getAllPosts');
        Route::get('/{post}', 'PostController@getPost');
    });

    Route::group(['prefix' => 'schools'], function () {
        Route::get('/', 'SchoolController@getAllSchools');
        Route::get('/{user}', 'SchoolController@getSchool');
    });

    Route::group(['prefix' => 'images'], function () {
        Route::get('/', 'ImageController@getAllImages');
        Route::get('/{image}', 'ImageController@getImage');
    });

    Route::group(['prefix' => 'search'], function () {
        Route::get('/', 'SearchController@searchDorms');
    });
});


// Protected Routes
Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Api', 'middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', 'AuthController@logoutUser');
    Route::patch('/update', 'AuthController@updateUser');
    Route::patch('/update-password', 'AuthController@changePassword');
    Route::delete('/delete', 'AuthController@deleteUser');
});
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => ['auth:sanctum']], function() { 
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@getAllUsers');
        Route::get('/{user}', 'UserController@getUser');
    });

    Route::group(['prefix' => 'dorms'], function () {
        Route::post('/', 'DormController@createDorm');
        Route::patch('/{dorm}', 'DormController@updateDorm');
        Route::delete('/{dorm}', 'DormController@deleteDorm');
    });

    Route::group(['prefix' => 'locations'], function () {
        Route::post('/', 'LocationController@createLocation');
        Route::patch('/{location}', 'LocationController@updateLocation');
        Route::delete('/{location}', 'LocationController@deleteLocation');
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::post('/', 'PostController@createPost');
        Route::patch('/{post}', 'PostController@updatePost');
        Route::delete('/{post}', 'PostController@deletePost');
    });

    Route::group(['prefix' => 'schools'], function () {
        Route::post('/', 'SchoolController@createSchool');
        Route::patch('/{school}', 'SchoolController@updateSchool');
        Route::delete('/{school}', 'SchoolController@deleteSchool');
    });

    Route::group(['prefix' => 'images'], function () {
        Route::post('/', 'ImageController@createImage');
        Route::patch('/{image}', 'ImageController@updateImage');
        Route::delete('/{image}', 'ImageController@deleteImage');
    });
});
