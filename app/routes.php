<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', "HomeController@login");
Route::get('/login', "HomeController@login");
Route::post('verify', array('before' => 'csrf', 'uses' => 'HomeController@validate'));
Route::get('edit', array('before' => 'auth', 'uses' => function(){return 'ok';}));
Route::get('/test', "HomeController@test");