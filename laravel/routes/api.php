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

Route::prefix('library')->middleware('jwt.auth')->group(function () {
    Route::apiResource('me', 'App\Http\Controllers\AuthController@me');
    Route::apiResource('logout', 'App\Http\Controllers\AuthController@logout');
    Route::apiResource('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::apiResource('search', 'App\Http\Controllers\AuthController@search');
    Route::get('lastbook', 'App\Http\Controllers\BookController@lastbook');
    Route::apiResource('book', 'App\Http\Controllers\BookController');
});
Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('register', 'App\Http\Controllers\AuthController@register');
