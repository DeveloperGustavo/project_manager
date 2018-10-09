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
    Route::resource('projects', 'ProjectController');
    Route::resource('tasks', 'TaskController');
    Route::post('tasks/{id}', 'TaskController@store')->name('create_task');
    Route::post('projects/{id}', 'ProjectController@IncludeMember')->name('include_member');
    Route::get('/home', 'HomeController@index')->name('home');
});
