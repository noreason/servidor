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

Route::post('login', 'AuthController@login');

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::name('system')->prefix('/system')->namespace('System')->group(function () {
        Route::resource('groups', 'GroupsController', [
            'only' => ['index', 'store', 'update', 'destroy'],
        ]);

        Route::resource('users', 'UsersController', [
            'only' => ['index', 'store', 'update', 'destroy'],
        ]);
    });
});
