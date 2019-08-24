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

Route::get('rtm','RtmController@index');
Route::get('rtm/add','RtmController@add');
Route::get('rtm/json','RtmController@json')->name('rtm.json');
Route::get('rtm/progresjson','RtmController@progresjson')->name('progres.json');
Route::get('rtm/progresjson/{id}','RtmController@progresjson');
Route::get('rtm/modal','RtmController@modal')->name('rtm.modal');

Auth::routes();

