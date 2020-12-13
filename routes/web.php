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

Route::get('/dashboard/surat/', 'SuratController@index')->name('surat');
Route::get('/dashboard/surat/create', 'SuratController@create')->name('surat.create');
Route::post('/dashboard/surat/create', 'SuratController@store')->name('surat.store');
Route::get('/dashboard/surat/{id}/process', 'SuratController@process')->name('surat.process');
Route::delete('/dashboard/surat/{id}', 'SuratController@destroy')->name('surat.destroy');

Route::get('/dashboard/anggaran/', 'AnggaranController@index')->name('anggaran');
Route::get('/dashboard/anggaran/create', 'AnggaranController@create')->name('anggaran.create');
Route::post('/dashboard/anggaran/create', 'AnggaranController@store')->name('anggaran.store');
Route::get('/dashboard/anggaran/{id}/edit', 'AnggaranController@edit')->name('anggaran.edit');
Route::put('/dashboard/anggaran/{id}', 'AnggaranController@update')->name('anggaran.update');
Route::delete('/dashboard/anggaran/{id}', 'AnggaranController@destroy')->name('anggaran.destroy');

Route::get('/dashboard/dusun', 'UserController@dusun')->name('dusun');
Route::get('/dashboard/dusun/create', 'UserController@dusun_create')->name('dusun.create');
Route::post('/dashboard/dusun/create', 'UserController@dusun_store')->name('dusun.store');
Route::get('/dashboard/dusun/{id}/edit', 'UserController@dusun_edit')->name('dusun.edit');
Route::put('/dashboard/dusun/{id}', 'UserController@dusun_update')->name('dusun.update');
Route::delete('/dashboard/dusun/{id}', 'UserController@dusun_destroy')->name('dusun.destroy');

Route::get('/dashboard/rukun-warga', 'UserController@rw')->name('rw');
Route::get('/dashboard/rukun-warga/create', 'UserController@rw_create')->name('rw.create');
Route::post('/dashboard/rukun-warga/create', 'UserController@rw_store')->name('rw.store');
Route::get('/dashboard/rukun-warga/{id}/edit', 'UserController@rw_edit')->name('rw.edit');
Route::put('/dashboard/rukun-warga/{id}', 'UserController@rw_update')->name('rw.update');
Route::delete('/dashboard/rukun-warga/{id}', 'UserController@rw_destroy')->name('rw.destroy');

Route::get('/dashboard/rukun-tetangga', 'UserController@rt')->name('rt');
Route::get('/dashboard/rukun-tetangga/create', 'UserController@rt_create')->name('rt.create');
Route::post('/dashboard/rukun-tetangga/create', 'UserController@rt_store')->name('rt.store');
Route::get('/dashboard/rukun-tetangga/{id}/edit', 'UserController@rt_edit')->name('rt.edit');
Route::put('/dashboard/rukun-tetangga/{id}', 'UserController@rt_update')->name('rt.update');
Route::delete('/dashboard/rukun-tetangga/{id}', 'UserController@rt_destroy')->name('rt.destroy');

Route::get('/dashboard/penduduk', 'UserController@penduduk')->name('penduduk');
Route::get('/dashboard/penduduk/create', 'UserController@penduduk_create')->name('penduduk.create');
Route::post('/dashboard/penduduk/create', 'UserController@penduduk_store')->name('penduduk.store');
Route::get('/dashboard/penduduk/{id}/edit', 'UserController@penduduk_edit')->name('penduduk.edit');
Route::delete('/dashboard/penduduk/{id}', 'UserController@penduduk_destroy')->name('penduduk.destroy');









Route::post('/json-rw/{id}','UserController@json_rw');
Route::post('/json-rt/{id}','UserController@json_rt');


Route::get('/dashboard/penduduk/{id}/ubah', 'UserController@penduduk_edit')->name('penduduk.edit');
Route::put('/dashboard/penduduk/{id}', 'UserController@penduduk_update')->name('penduduk.update');
Route::get('/dashboard/penduduk/filter/warga-kurang-mampu', 'UserController@penduduk_filter_kurangmampu')->name('penduduk.filter.kurangmampu');
Route::get('/dashboard/penduduk/toggle/warga-kurang-mampu/{id}', 'UserController@penduduk_toggle_kurangmampu')->name('penduduk.toggle.kurangmampu');
Route::get('/dashboard/penduduk/toggle/warga/{id}', 'UserController@penduduk_toggle_warga')->name('penduduk.toggle.warga');


Route::get('/dashboard/jurnalis', 'UserController@jurnalis')->name('jurnalis');
Route::get('/dashboard/jurnalis/tambah', 'UserController@jurnalis_create')->name('jurnalis.create');
Route::post('/dashboard/jurnalis/tambah', 'UserController@jurnalis_store')->name('jurnalis.store');
Route::delete('/dashboard/jurnalis/{id}', 'UserController@jurnalis_destroy')->name('jurnalis.destroy');



Route::get('/dashboard/berita/buat-berita', 'NewsController@create')->name('news.create');