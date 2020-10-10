<?php

use Illuminate\Http\Request;

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

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/login', 'Api\AuthController@login');
        Route::post('/refreshToken', 'Api\AuthController@refreshToken');
    });

    Route::prefix('users')->group(function () {
        Route::get('/profile', 'Api\UserController@profile');
        Route::post('/register', 'Api\UserController@register');
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::prefix('auth')->group(function () {
            Route::get('/logout', 'Api\AuthController@logout');
        });
    });
});
