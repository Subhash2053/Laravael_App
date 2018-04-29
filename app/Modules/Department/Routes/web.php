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

Route::group(['prefix' => 'dashboard/department'], function () {
    Route::get('/', 'DepartmentController@index')->name('department.index');
    Route::get('/create', 'DepartmentController@create')->name('department.create');





    Route::post('department', ['as' => 'department.store', 'uses' => 'DepartmentController@store']);

// SHOW
    Route::get('department/{id}', ['as' => 'department.show', 'uses' => 'DepartmentController@show'])->where('id', '[0-9]+');

// EDIT | UPDATE
    Route::get('/{id}/edit', ['as' => 'department.edit', 'uses' => 'DepartmentController@edit'])->where('id', '[0-9]+');
    Route::put('department/{id}', ['as' => 'department.update', 'uses' => 'DepartmentController@update'])->where('id', '[0-9]+');

// DELETE
    Route::delete('department', ['as' => 'department.destroy', 'uses' => 'DepartmentController@destroy']);
    Route::get('department/{id}/delete', ['as' => 'department.delete', 'uses' => 'DepartmentController@delete']);

});
