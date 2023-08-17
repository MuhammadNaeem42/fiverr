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


Route::resource('categories', App\Http\Controllers\API\Admin\CategoryAPIController::class);
Route::resource('sliders', App\Http\Controllers\API\Admin\SliderAPIController::class);
Route::post('contacts', [App\Http\Controllers\API\Admin\HomeAPIController::class,'contact']);
Route::post('subscribers', [App\Http\Controllers\API\Admin\HomeAPIController::class,'subscriber']);
Route::get('settings', [App\Http\Controllers\API\Admin\HomeAPIController::class,'settings']);
