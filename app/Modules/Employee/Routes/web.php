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

Route::group(['prefix' => 'dashboard/employee','middleware' => [ 'auth']], function () {

    Route::get('/', 'EmployeeController@index')->name('employee.index');
    Route::get('/create', 'EmployeeController@create')->name('employee_create');





    Route::post('employee', ['as' => 'employee.store', 'uses' => 'EmployeeController@store']);

// SHOW
    Route::get('/{id}', ['as' => 'employee.show', 'uses' => 'EmployeeController@show'])->where('id', '[0-9]+');

// EDIT | UPDATE
    Route::get('/{id}/edit', ['as' => 'employee.edit', 'uses' => 'EmployeeController@edit'])->where('id', '[0-9]+');
    Route::put('/{id}', ['as' => 'employee.update', 'uses' => 'EmployeeController@update'])->where('id', '[0-9]+');

// DELETE
    Route::delete('employee', ['as' => 'employee.destroy', 'uses' => 'EmployeeController@destroy']);
    Route::get('/{id}/delete', ['as' => 'employee.delete', 'uses' => 'EmployeeController@delete']);

    Route::get('/status', ['as' => 'employee.status', 'uses' => 'EmployeeController@status']);
    Route::get('availability/{id}/delete', ['as' => 'availability.delete', 'uses' => 'AvailabilityController@delete']);
});
