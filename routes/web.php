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
    return view('welcome');
});

Route::get('/create/job_description','JobDescriptionController@create');
Route::post('/create/job_description', 'JobDescriptionController@store');
Route::get('/job_descriptions', 'JobDescriptionController@index');
Route::get('/edit/job_description/{id}','JobDescriptionController@edit');
Route::post('/edit/job_description/{id}','JobDescriptionController@update');
Route::delete('/delete/job_description/{id}','JobDescriptionController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
