<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DormController;

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

// Route::post('dorms', 'DormController@store');
// Route::get('dorms', 'DormController@index');
// Route::get('dorms/{id}', 'DormController@show');
// Route::patch('dorms/{id}', 'DormController@update');
// Route::delete('dorms/{id}', 'DormController@destroy');

Route::apiResource('dorms', DormController::class);