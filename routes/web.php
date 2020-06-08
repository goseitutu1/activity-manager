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
    return view('auth.login');
});

Route::get('/activityForm', function()
{
    return View::make('pages.activityForm');
});

Route::get('/activityGrid', function()
{
    return View::make('pages.activityGrid');
});

Route::get('/logForm', function()
{
    return View::make('pages.logForm');
});

Route::get('/logGrid', function()
{
    return View::make('pages.logGrid');
});

//SMS_logController routes
Route::get('sms_log', 'SMS_logController@index');
Route::get('sms_log/logForm', 'SMS_logController@create');
Route::post('sms_log/post', 'SMS_logController@store');
Route::get('/sms_log/{sms_id}', 'SMS_logController@showLog');
Route::get('/sms_log/{sms_id}/edit', 'SMS_logController@editLog');
Route::put('/update/{sms_id}', 'SMS_logController@updateLog');
Route::delete('/delete/{sms_id}', 'SMS_logController@deleteLog');
Route::post('/query', 'SMS_logController@showQuery');

//ActivitiesController routes
Route::get('/activityGrid', 'ActivitiesController@index');
Route::get('/activity/{id}', 'ActivitiesController@show');
Route::get('activityGrid/activityForm', 'ActivitiesController@create');
Route::post('activityGrid/post', 'ActivitiesController@store');
Route::get('/activityGrid/{id}/edit', 'ActivitiesController@edit');
Route::put('/{id}', 'ActivitiesController@update');
Route::delete('activityGrid/{id}', 'ActivitiesController@destroy');
Route::post('activityGrid/query', 'ActivitiesController@showQuery');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
