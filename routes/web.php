<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('dorms', [App\Http\Controllers\DormsController::class, 'index'])->name('dorms');
Route::get('/viewDorm', [App\Http\Controllers\ViewDormController::class, 'index'])->name('viewDorm');
