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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');

Route::get('/user','UserController@index');
Route::get('user/create','UserController@create')->middleware('role:admin|editor');
Route::get('user/json','UserController@json');

// Route::get('rtm','RtmController@index');
// Route::get('rtm/add','RtmController@add');
// Route::get('rtm/json','RtmController@json')->name('rtm.json');
// Route::get('rtm/progresjson','RtmController@progresjson')->name('progres.json');
// Route::get('rtm/progresjson/{id}','RtmController@progresjson');
// Route::get('rtm/modal','RtmController@modal')->name('rtm.modal');

Route::get('masalah','MasalahController@index');
Route::get('masalah/detail','MasalahController@index');
Route::get('masalah/detail/{id}','MasalahController@detail');
// Route::get('masalah/add','MasalahController@add')->name('masalah.add');
Route::get('masalah/create','MasalahController@create')->name('masalah.create');
Route::get('masalah/json','MasalahController@json')->name('masalah.json');
Route::get('masalah/progresjson','MasalahController@progresjson')->name('progres.json');
Route::get('masalah/progresjson/{id}','MasalahController@progresjson');
Route::get('masalah/modal','MasalahController@modal')->name('masalah.modal');

Route::get('test/{id}', function($id)
{
    return $id;
});

Auth::routes();

