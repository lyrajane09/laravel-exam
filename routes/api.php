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

Route::group([
    'prefix' => 'auth'  
], function () {
    Route::post('login', 'PlayerController@login');
    Route::post('signup', 'PlayerController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'PlayerController@logout');
        // Route::get('test', 'PlayerController@test');
        // Route::get('user', 'PlayerController@user');
    });
});

#routes
Route::get('import', 'PlayerController@import');
Route::get('all-players', 'PlayerController@all_players');
Route::get('single-player/{playerID?}', 'PlayerController@single_player');
