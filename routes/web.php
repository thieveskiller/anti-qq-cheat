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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list', 'WebController@index')->name('web_list');
Route::get('/commit', 'WebController@commit')->name('commit_web')->middleware('auth');
Route::post('/commit', 'WebController@add')->name('commit_web')->middleware('recaptcha');
