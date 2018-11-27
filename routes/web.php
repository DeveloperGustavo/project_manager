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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

//    Route::resource('tasks', 'TaskController');

    Route::post('/store/{id}', 'TaskController@store')->name('tasks.store');
    Route::put('/update/{id}', 'TaskController@update')->name('tasks.update');

    Route::post('tasks/{id}', 'TaskController@update')
        ->name('check');

    Route::post('tasks/{id}', 'TaskController@update')
        ->name('remove');

    Route::resource('projects', 'ProjectController');

    Route::post('projects/{id}', 'ProjectController@IncludeMember')
        ->name('include_member');

    Route::get('/home', 'HomeController@index')->name('home');
});
