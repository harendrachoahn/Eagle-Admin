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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'JwtAuthController@login');
//Route::post('register', 'JwtAuthController@register');

Route::group(['middleware' => 'jwt.auth'], function () {

    Route::get('logout', 'JwtAuthController@logout');
    Route::get('user-info', 'JwtAuthController@getUser');
    Route::post('clock-in-out', 'ClockInOutController@clockInOut');
    Route::get('history', 'ClockInOutController@clockInOutHistory');



});