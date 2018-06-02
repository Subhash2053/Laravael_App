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
    return view('main');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::get('standalone-filemanager/{filed_id}/{type?}',
    ['as' => 'standalone-filemanager', 'uses' => 'FilemanagerController@standalone']);
Route::post('upload/image', ['as' => 'uploadImage', 'uses' => 'FilemanagerController@uploadImage']);
Route::get('/loadData','AjaxController@loadData');


