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
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- AUTH
Auth::routes(['register' => false, 'reset' => false, 'confirm' => false, 'verify' => false]);
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- SITE
Route::get('/', 'SiteController@index')->name('site');
Route::get('/visi-misi', 'SiteController@visimisi')->name('site.visimisi');
Route::get('/article', 'SiteController@article')->name('site.article');
Route::get('/article/{id}', 'SiteController@article_show')->name('site.article.show');
Route::get('/sejarah', 'SiteController@sejarah')->name('site.sejarah');
Route::get('/profile', 'SiteController@profile')->name('site.profile');
Route::get('/facilities', 'SiteController@facilities')->name('site.facilities');
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- DASHBOARD
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- SURAT
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
Route::put('/dashboard/penduduk/{id}', 'UserController@penduduk_update')->name('penduduk.update');
Route::delete('/dashboard/penduduk/{id}', 'UserController@penduduk_destroy')->name('penduduk.destroy');

Route::get('/dashboard/penduduk/filter/warga-kurang-mampu', 'UserController@penduduk_filter_kurangmampu')->name('penduduk.filter.kurangmampu');

Route::get('/dashboard/penduduk/toggle/warga-kurang-mampu/{id}', 'UserController@penduduk_toggle_kurangmampu')->name('penduduk.toggle.kurangmampu');
Route::get('/dashboard/penduduk/toggle/warga/{id}', 'UserController@penduduk_toggle_warga')->name('penduduk.toggle.warga');

Route::get('/dashboard/aspiration', 'AspirasiController@index')->name('aspiration');
Route::get('/dashboard/aspiration/create', 'AspirasiController@create')->name('aspiration.create');
Route::post('/dashboard/aspiration/create', 'AspirasiController@store')->name('aspiration.store');
Route::get('/dashboard/aspiration/{id}/process', 'AspirasiController@process')->name('aspiration.process');
Route::delete('/dashboard/aspiration/{id}', 'AspirasiController@destroy')->name('aspiration.destroy');

Route::post('/json-rw/{id}','UserController@json_rw');
Route::post('/json-rt/{id}','UserController@json_rt');

Route::get('/dashboard/jurnalis', 'UserController@jurnalis')->name('jurnalis');
Route::get('/dashboard/jurnalis/create', 'UserController@jurnalis_create')->name('jurnalis.create');
Route::post('/dashboard/jurnalis/create', 'UserController@jurnalis_store')->name('jurnalis.store');
Route::delete('/dashboard/jurnalis/{id}', 'UserController@jurnalis_destroy')->name('jurnalis.destroy');




Route::get('/dashboard/article', 'ArticleController@index')->name('article');
Route::get('/dashboard/article/create', 'ArticleController@create')->name('article.create');
Route::post('/dashboard/article/create', 'ArticleController@store')->name('article.store');
Route::get('/dashboard/article/{id}', 'ArticleController@show')->name('article.show');
Route::get('/dashboard/article/edit/{id}', 'ArticleController@edit')->name('article.edit');
Route::put('/dashboard/article/{id}', 'ArticleController@update')->name('article.update');
Route::delete('/dashboard/article/{id}', 'ArticleController@destroy')->name('article.destroy');

Route::post('/dashboard/article/comment/create/{id}', 'ArticleController@comment_store')->name('article-comment.store');
Route::get('/dashboard/article/comment/{id}', 'ArticleController@comment_destroy')->name('article-comment.destroy');
Route::get('/dashboard/article/{id}/{type}', 'ArticleController@toggle')->name('article.toggle');





Route::get('/dashboard/setting', 'SettingController@index')->name('setting');
Route::put('/dashboard/setting', 'SettingController@update')->name('setting.update');


Route::get('/dashboard/info', 'SettingController@info')->name('info');
Route::put('/dashboard/info', 'SettingController@info_update')->name('info.update');



Route::get('/dashboard/visimisi', 'SettingController@visimisi')->name('visimisi');
Route::get('/dashboard/visimisi/create', 'SettingController@visimisi_create')->name('visimisi.create');
Route::post('/dashboard/visimisi/create', 'SettingController@visimisi_store')->name('visimisi.store');
Route::get('/dashboard/visimisi/edit/{id}', 'SettingController@visimisi_edit')->name('visimisi.edit');
Route::put('/dashboard/visimisi/{id}', 'SettingController@visimisi_update')->name('visimisi.update');
Route::delete('/dashboard/visimisi/{id}', 'SettingController@visimisi_destroy')->name('visimisi.destroy');



Route::get('/dashboard/carousel', 'SettingController@carousel')->name('carousel');
Route::get('/dashboard/carousel/create', 'SettingController@carousel_create')->name('carousel.create');
Route::post('/dashboard/carousel/create', 'SettingController@carousel_store')->name('carousel.store');
Route::get('/dashboard/carousel/edit/{id}', 'SettingController@carousel_edit')->name('carousel.edit');
Route::put('/dashboard/carousel/{id}', 'SettingController@carousel_update')->name('carousel.update');
Route::delete('/dashboard/carousel/{id}', 'SettingController@carousel_destroy')->name('carousel.destroy');

Route::get('/dashboard/aparatur', 'SettingController@aparatur')->name('aparatur');
Route::get('/dashboard/aparatur/create', 'SettingController@aparatur_create')->name('aparatur.create');
Route::post('/dashboard/aparatur/create', 'SettingController@aparatur_store')->name('aparatur.store');
Route::get('/dashboard/aparatur/edit/{id}', 'SettingController@aparatur_edit')->name('aparatur.edit');
Route::put('/dashboard/aparatur/{id}', 'SettingController@aparatur_update')->name('aparatur.update');
Route::delete('/dashboard/aparatur/{id}', 'SettingController@aparatur_destroy')->name('aparatur.destroy');


