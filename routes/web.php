<?php

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

// Route::get('/', function () { return view('welcome');})->middleware('auth');
Route::get('/', ['as'=>'home', function () { return view('welcome');}])->middleware('auth');

// Route::get('/login', function () { return view('login');})->middleware('guest');


// Route::get('/login', ['as'=>'login', function () { return view('login');}])->middleware('guest');
Route::get('/login', ['as'=>'login', 'uses'=>'UserController@getLogin']);


Route::post('/login', ['as'=>'login.post', 'uses'=>'UserController@postLogin']);

Route::get('/logout', ['as'=>'logout', 'uses'=>'UserController@logout'])->middleware('auth');



// Route::post('task', 'TaskController@store');
