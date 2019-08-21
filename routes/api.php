<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List tasks
Route::post('tasks', 'TaskController@index');

// Route::get('article/{id}', 'ArticleController@show');

// Create new task
Route::post('task', 'TaskController@store');

// Update task
Route::put('task', 'TaskController@edit');

// Delete arttaskicle
Route::delete('task/{id}', 'TaskController@destroy');


