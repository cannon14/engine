<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Admin Routes
Route::group(array('namespace' => 'admin'), function() {
	Route::resource('users', 'UserController');
    Route::resource('parsers', 'ParserController');
});

// API Routes
Route::group(array('prefix' => 'api/v1', 'namespace' => 'api\v1'), function() {
	Route::resource('parsers', 'ParserController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'HomeController@index');