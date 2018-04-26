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

    Route::get('/', 'EmployeeController@index')->name('employee');
    Route::get('/create', 'EmployeeController@create')->name('employee_create');





    Route::post('employee', ['as' => 'employee.store', 'uses' => 'EmployeeController@store']);

// SHOW
    Route::get('employee/{id}', ['as' => 'employee.show', 'uses' => 'EmployeeController@show'])->where('id', '[0-9]+');

// EDIT | UPDATE
    Route::get('employee/{id}/edit', ['as' => 'employee.edit', 'uses' => 'EmployeeController@edit'])->where('id', '[0-9]+');
    Route::put('employee/{id}', ['as' => 'employee.update', 'uses' => 'EmployeeController@update'])->where('id', '[0-9]+');

// DELETE
    Route::delete('employee', ['as' => 'employee.destroy', 'uses' => 'EmployeeController@destroy']);
    Route::get('employee/{id}/delete', ['as' => 'employee.delete', 'uses' => 'EmployeeController@delete']);

    Route::get('employee/status', ['as' => 'employee.status', 'uses' => 'EmployeeController@status']);

});
