<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

// TODO: add gzip/brotli support to the server, modify middleware SetEncoding and add 'encoding' as middleware to serve compressed ressources at user

/**
 * Protected views
 */
Route::middleware(['translations', 'cache.headers:public;max_age=2628000;etag', 'auth'])->group(function() {

    Route::get('/settings', 'App\Http\Controllers\Views\SettingsController@index');

});

/**
 * Public views
 */
Route::middleware(['translations', 'cache.headers:public;max_age=2628000;etag'])->group(function() {

	Route::get('/', 'App\Http\Controllers\Views\HomeController@index');

    Auth::routes(['verify' => true]);

	// Authorize vuejs routes
	Route::get('/{any}', 'App\Http\Controllers\Views\HomeController@index')->where('any', '.*');

});
