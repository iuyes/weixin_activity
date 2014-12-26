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

Route::get('/login', "HomeController@login");
Route::post('verify', array('before' => 'csrf', 'uses' => 'HomeController@validate'));
Route::get('edit', array('before' => 'auth', 'uses' => 'HomeController@edit'));
Route::post('upload', array('before' => 'auth', 'uses' => 'HomeController@update'));
Route::post('insert', array('before' => 'auth', 'uses' => 'HomeController@insert'));
Route::post('delete', array('before' => 'auth', 'uses' => 'HomeController@delete'));
Route::get('/', "HomeController@getInfo");
