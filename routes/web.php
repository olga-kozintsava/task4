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


Route::get('/', 'MainPageController@show')->middleware('authcheck');
Route::post('/delete', 'MainPageController@delete')->name('delete.user');
Route::get('/login', 'LoginController@show');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::post('/signup', 'RegistrationController@create');
Route::get('/signup', 'RegistrationController@show');


