<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'dashboard/vacancy','middleware' => [ 'auth']], function () {

    Route::get('/', 'VacancyController@index')->name('vacancy.index');
    Route::get('/create', 'VacancyController@create')->name('vacancy.create');





    Route::post('/vacancy', ['as' => 'vacancy.store', 'uses' => 'VacancyController@store']);

// SHOW
    Route::get('/{id}', ['as' => 'vacancy.show', 'uses' => 'VacancyController@show'])->where('id', '[0-9]+');

// EDIT | UPDATE
    Route::get('/{id}/edit', ['as' => 'vacancy.edit', 'uses' => 'VacancyController@edit'])->where('id', '[0-9]+');
    Route::put('/{id}', ['as' => 'vacancy.update', 'uses' => 'VacancyController@update'])->where('id', '[0-9]+');

// DELETE
    Route::delete('vacancy', ['as' => 'vacancy.destroy', 'uses' => 'VacancyController@destroy']);
    Route::get('/{id}/delete', ['as' => 'vacancy.delete', 'uses' => 'VacancyController@delete']);

    Route::get('/status', ['as' => 'vacancy.status', 'uses' => 'VacancyController@status']);

});
