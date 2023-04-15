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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@getAllUsers');
        Route::get('/{user}', 'UserController@getUser');
    });

    Route::group(['prefix' => 'dorms'], function () {
        Route::post('/', 'DormController@createDorm');
        Route::get('/', 'DormController@getAllDorms');
        Route::get('/{dorm}', 'DormController@getDorm');
        Route::patch('/{dorm}', 'DormController@updateDorm');
        Route::delete('/{dorm}', 'DormController@deleteDorm');
    });

    Route::group(['prefix' => 'locations'], function () {
        Route::post('/', 'LocationController@createLocation');
        Route::get('/', 'LocationController@getAllLocations');
        Route::get('/{location}', 'LocationController@getLocation');
        Route::patch('/{location}', 'LocationController@updateLocation');
        Route::delete('/{location}', 'LocationController@deleteLocation');
    });

    Route::group(['prefix' => 'reviews'], function () {
        Route::post('/', 'ReviewController@createReview');
        Route::get('/', 'ReviewController@getAllReviews');
        Route::get('/{review}', 'ReviewController@getReview');
        Route::patch('/{review}', 'ReviewController@updateReview');
        Route::delete('/{review}', 'ReviewController@deleteReview');
    });

    Route::group(['prefix' => 'ratings'], function () {
        Route::post('/', 'RatingController@createRating');
        Route::get('/', 'RatingController@getAllRatings');
        Route::get('/{rating}', 'RatingController@getRating');
        Route::patch('/{rating}', 'RatingController@updateRating');
        Route::delete('/{rating}', 'RatingController@deleteRating');
        Route::get('/dorms/{dorm}', 'RatingController@getRatingsByDormId');
        Route::get('/users/{user}', 'RatingController@getRatingsByUserId');
        Route::get('/dorms/{dorm}/average', 'RatingController@getAverageRatingByDormId');
        Route::get('/dorms/{dorm}/location/average', 'RatingController@getAverageRatingOfLocationByDormId');
        Route::get('/dorms/{dorm}/security/average', 'RatingController@getAverageRatingOfSecurityByDormId');
        Route::get('/dorms/{dorm}/internet/average', 'RatingController@getAverageRatingOfInternetByDormId');
        Route::get('/dorms/{dorm}/bathroom/average', 'RatingController@getAverageRatingOfBathroomByDormId');
    });
});
