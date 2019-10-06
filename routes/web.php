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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
// Route::resource('home', 'HomeController');
Route::get('/user','UserController@index');
Route::get('user/create','UserController@create')->middleware('role:admin');
Route::get('user/json','UserController@json');
//Masalah Routes
Route::get('masalah/getActiveAttribute', 'MasalahController@getActiveAttribute');
Route::get('masalah/progresjson','MasalahController@progresjson')->name('progres.json');
Route::get('masalah/progresjson/{id}','MasalahController@progresjson');
Route::get('masalah/dept', 'MasalahController@loadDepartemen')->name('masalah.dept');
// Route::post('masalah/jsonuraian','MasalahController@jsonuraian')->name('masalah.jsonuraian');
// Route::match(['get', 'post'], 'masalah/jsonuraian', 'MasalahController@jsonuraian')->name('masalah.jsonuraian');
// Route::post('masalah/jsonuraian', 'MasalahController@jsonuraian')->name('masalah.jsonuraian');
Route::resource('masalah', 'MasalahController');
//RTM Routes
Route::get('rtm/jsonrtm', 'RtmController@jsonrtm')->name('rtm.jsonrtm');
Route::get('rtm/jsonrtm/{rtm}', 'RtmController@jsonrtm');
Route::resource('rtm', 'RtmController');

//Departemen


