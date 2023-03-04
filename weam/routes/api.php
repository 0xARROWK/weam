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



/**
 * Public api routes with session requirements
 */
Route::middleware('api-session')->group(function() {

    // language handler
    Route::prefix('languages')->group(function() {

        Route::get('list','\App\Http\Controllers\Api\LanguageController@availableLanguagesCodeAndLanguage');

        Route::get('available', '\App\Http\Controllers\Api\LanguageController@availableLanguagesCode');

        Route::get('default','\App\Http\Controllers\Api\LanguageController@defaultLanguage');

        Route::post('modify/{locale}', 'App\Http\Controllers\Api\LanguageController@changeLanguage')->where('locale', '[a-z]{2}_[A-Z]{2}');

    });

});



/**
 * Public api routes
 */

// account registration verification
Route::prefix('signin')->group(function() {

    Route::get('/username/{username}', 'App\Http\Controllers\Auth\RegisterController@checkIfUsernameExist')
        ->where('username', '^[_a-zA-Z0-9]{3,25}$');
    Route::get('/email/{email}', 'App\Http\Controllers\Auth\RegisterController@checkIfEmailExist')
        ->where('email', '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$');
    Route::post('/password', 'App\Http\Controllers\Auth\RegisterController@checkPasswordStrength');

});



/**
 * Protected api routes
 */

// users data
Route::middleware(['auth:api', 'scopes:user-data'])->group(function() {

    Route::prefix('/user')->group(function() {

        Route::get('/', function (Request $request) {
            return $request->user();
        });

    });

});
