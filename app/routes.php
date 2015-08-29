<?php

include('macros.php');

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

Route::get('/', function()
{
  //$users = User::all();
  //return View::make('users')->with('users', $users);
	return View::make('hello');
});

Route::resource('user', 'UserController');
Route::get('/login', 'UserController@login');

/**
 * Routes dealing with the Sessions controller
*/
Route::resource('sessions', 'SessionsController', array('only' => array('create', 'store', 'destroy')));
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/home', 'SessionsController@create');

Route::resource('walk', 'WalkController');
