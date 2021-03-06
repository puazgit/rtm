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

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('home/chartDash', 'HomeController@chartDash')->name('home.chart');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/cekcok', 'HomeController@cekcok');
Route::get('/user', 'UserController@index');
Route::get('user/create', 'UserController@create')->middleware('role:admin');
Route::get('user/json', 'UserController@json');
//Masalah Routes

Route::get('masalah/test', 'MasalahController@test');
Route::get('masalah/getActiveAttribute', 'MasalahController@getActiveAttribute');
Route::post('masalah/media', 'MasalahController@saveMedia')->name('masalah.saveMedia');
Route::get('masalah/progresjson', 'MasalahController@progresjson')->name('progres.json');
Route::get('masalah/progresjson/{id}', 'MasalahController@progresjson');
Route::get('masalah/dept', 'MasalahController@loadDepartemen')->name('masalah.dept');
Route::resource('masalah', 'MasalahController');

//Bahan Routes
Route::post('evaluasi/media', 'EvaluasiController@saveMedia')->name('evaluasi.saveMedia');
Route::resource('evaluasi', 'EvaluasiController');

Route::get('bahan/loaddata', 'BahanController@loaddata')->name('bahan.cari');
Route::get('bahan/get-jenis/{sub_jenis_id}', 'BahanController@getJenis')->name('bahan.getjenis');
Route::get('bahan/torisalah', 'BahanController@toRisalah')->name('bahan.torisalah');
Route::get('bahan/bahanoff', 'BahanController@bahanoff')->name('bahan.bahanoff');
Route::get('bahan/rtmlama', 'BahanController@rtmlama')->name('bahan.rtmlama');
Route::resource('bahan', 'BahanController');

Route::resource('risalah', 'RisalahController');
//RTM Routes
// Route::get('/sendmail', 'MasalahController@webmail');
Route::get('rtm/test', 'RtmController@test')->name('rtm.test');
Route::get('rtm/cek', 'RtmController@cek')->name('rtm.cek');
Route::get('rtm/loadRtm', 'RtmController@loadRtm')->name('rtm.load');
Route::post('rtm/media', 'RtmController@saveMedia')->name('rtm.saveMedia');
Route::get('rtm/jsonrtm', 'RtmController@jsonrtm')->name('rtm.jsonrtm');
Route::get('rtm/jsonrtm/{rtm}', 'RtmController@jsonrtm');
Route::get('rtm/add', 'RtmController@add')->name('rtm.add');
Route::post('rtm/save', 'RtmController@save')->name('rtm.save');
Route::resource('rtm', 'RtmController');
Route::resource('jenis', 'JenisController');
