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

    Route::group(['prefix' => 'reviews'], function () {
        Route::get('/', 'ReviewController@getAllReviews');
        Route::get('/{review}', 'ReviewController@getReview');
    });

    Route::group(['prefix' => 'ratings'], function () {
        Route::get('/', 'RatingController@getAllRatings');
        Route::get('/{rating}', 'RatingController@getRating');
    });
});


// Protected Routes
Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Api', 'middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', 'AuthController@logoutUser');
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

    Route::group(['prefix' => 'reviews'], function () {
        Route::post('/', 'ReviewController@createReview');
        Route::patch('/{review}', 'ReviewController@updateReview');
        Route::delete('/{review}', 'ReviewController@deleteReview');
    });

    Route::group(['prefix' => 'ratings'], function () {
        Route::post('/', 'RatingController@createRating');
        Route::patch('/{rating}', 'RatingController@updateRating');
        Route::delete('/{rating}', 'RatingController@deleteRating');
    });
});
