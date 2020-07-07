<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});



Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/tasks', 'TaskController@index');
    Route::get('/tasks/create', 'TaskController@create');
    Route::post('/tasks/create', 'TaskController@store');
    Route::patch('/tasks/{task}/update', 'TaskController@update')->name('task.update');
    Route::delete('/tasks/{task}/delete', 'TaskController@delete')->name('task.delete');
    Route::post('/tasks/{task}/completed', 'TaskController@completed')->name('task.completed');
    Route::post('/tasks/{task}/incomplete', 'TaskController@incomplete')->name('task.incomplete');
    Route::get('/tasks/{task}/edit', 'TaskController@edit')->name('task.edit');

});

