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

Route::get('/', 'SiteController@index')->name('site');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Route::get('/dashboard/penduduk', 'UserController@penduduk')->name('penduduk');
Route::get('/dashboard/rukun-tetangga', 'UserController@rt')->name('rt');
Route::get('/dashboard/rukun-warga', 'UserController@rw')->name('rw');
Route::get('/dashboard/dusun', 'UserController@dusun')->name('dusun');
