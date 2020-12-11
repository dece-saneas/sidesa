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
Route::get('/dashboard/penduduk/tambah', 'UserController@penduduk_create')->name('penduduk.create');
Route::post('/dashboard/penduduk/tambah', 'UserController@penduduk_store')->name('penduduk.store');
Route::get('/dashboard/penduduk/{id}/edit', 'UserController@penduduk_edit')->name('penduduk.edit');
Route::put('/dashboard/penduduk/{id}', 'UserController@penduduk_update')->name('penduduk.update');
Route::delete('/dashboard/penduduk/{id}', 'UserController@penduduk_destroy')->name('penduduk.destroy');
Route::get('/dashboard/penduduk/filter/warga-desa', 'UserController@penduduk_filter_warga')->name('penduduk.filter.warga');
Route::get('/dashboard/penduduk/filter/warga-kurang-mampu', 'UserController@penduduk_filter_kurangmampu')->name('penduduk.filter.kurangmampu');

Route::get('/dashboard/rukun-tetangga', 'UserController@rt')->name('rt');
Route::get('/dashboard/rukun-warga', 'UserController@rw')->name('rw');
Route::get('/dashboard/dusun', 'UserController@dusun')->name('dusun');
