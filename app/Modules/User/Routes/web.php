<?php

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
|
*/
Route::get('admin/permission-denied', ['as' => 'permission.denied', 'uses' => 'AuthController@permissionDenied']);
// LOGIN
Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('login', ['as' => 'login-post', 'uses' => 'AuthController@authenticate']);





/*//GOOGLE LOGIN
Route::get('/social-login/{provider}', ['as' => 'social.login', 'uses' => 'AuthController@socialLogin']);
Route::get('/social-callback/{provider}', ['as' => 'social.callback', 'uses' => 'AuthController@socialCallback']);



//USER Change Password
Route::get('/change-password',
    ['as' => 'user.changePassword', 'uses' => 'UserController@changePassword'])->middleware('auth');

Route::post('/change-password',
    ['as' => 'user.changePassword.post', 'uses' => 'UserController@changePasswordPost'])->middleware('auth');

//SEND VErIFICATION CODE TO MOBILE
Route::get('/send-verification-code',
    ['as' => 'send.verification.code', 'uses' => 'UserController@sendVerificationCodeToMobile'])->middleware('auth');
Route::post('/send-verification-code',
    [
        'as' => 'send.verification.code.post',
        'uses' => 'UserController@sendVerificationCodeToMobilePost'
    ])->middleware('auth');

//VERIDY MOBILE VIA CODE
Route::get('/mobile-verify',
    ['as' => 'mobile.verify', 'uses' => 'UserController@verifyMobile'])->middleware('auth');
Route::post('/mobile-verify',
    [
        'as' => 'mobile.verify.post',
        'uses' => 'UserController@verifyMobilePost'
    ])->middleware('auth');*/






// LOGOUT
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);


Route::group(['prefix' => 'admin', 'middleware' => ['auth',/*, 'permission'*/]], function () {

    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    |
    */

    // INDEX
    /*    Route::get('role', ['as' => 'role.index', 'uses' => 'RoleController@index']);

        // CREATE | STORE
        Route::get('role/create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
        Route::post('role', ['as' => 'role.store', 'uses' => 'RoleController@store']);

        // SHOW
        Route::get('role/{id}', ['as' => 'role.show', 'uses' => 'RoleController@show'])->where('id', '[0-9]+');

        // EDIT | UPDATE
        Route::get('role/{id}/edit', ['as' => 'role.edit', 'uses' => 'RoleController@edit'])->where('id', '[0-9]+');
        Route::put('role/{id}', ['as' => 'role.update', 'uses' => 'RoleController@update'])->where('id', '[0-9]+');

        // DELETE
        Route::delete('role', ['as' => 'role.destroy', 'uses' => 'RoleController@destroy']);*/


    /*
    |--------------------------------------------------------------------------
    | Permission
    |--------------------------------------------------------------------------
    |
    */

    // INDEX
    /*  Route::get('permission', ['as' => 'permission.index', 'uses' => 'PermissionController@index']);

      // CREATE | STORE
      Route::get('permission/create', ['as' => 'permission.create', 'uses' => 'PermissionController@create']);
      Route::post('permission', ['as' => 'permission.store', 'uses' => 'PermissionController@store']);

      // SHOW
      Route::get('permission/{id}', ['as' => 'permission.show', 'uses' => 'PermissionController@show'])->where('id',
          '[0-9]+');

      // EDIT | UPDATE
      Route::get('permission/{id}/edit', ['as' => 'permission.edit', 'uses' => 'PermissionController@edit'])->where('id',
          '[0-9]+');
      Route::put('permission/{id}', ['as' => 'permission.update', 'uses' => 'PermissionController@update'])->where('id',
          '[0-9]+');

      // DELETE
      Route::delete('permission', ['as' => 'permission.destroy', 'uses' => 'PermissionController@destroy']);*/

    /*
    |--------------------------------------------------------------------------
    | User Role/Group
    |--------------------------------------------------------------------------
    |
    */

    Route::group(['prefix' => 'role'], function () {
        //List
        Route::get('list', ['as' => 'role.index', 'uses' => 'RoleController@index']);
        ///CREATE
        Route::get('create', ['as' => 'role.create', 'uses' => 'RoleController@create']);

        Route::post('create', ['as' => 'role.store', 'uses' => 'RoleController@store']);

        // UPDATE
        Route::get('{id}/edit', ['as' => 'role.edit', 'uses' => 'RoleController@edit']);

        Route::put('{id}', ['as' => 'role.update', 'uses' => 'RoleController@update'])->where('id',
            '[0-9]+');

        // DELETE
        Route::get('{id}/delete', ['as' => 'role.destroy', 'uses' => 'RoleController@destroy']);

        Route::get('status', ['as' => 'role.status', 'uses' => 'RoleController@status']);



    });

    /*
  |--------------------------------------------------------------------------
  | Users
  |--------------------------------------------------------------------------
  |
  */

    Route::group(['prefix' => 'user'], function () {
        //List
        Route::get('list', ['as' => 'user.index', 'uses' => 'UserController@index']);
        ///CREATE
        Route::get('create', ['as' => 'user.create', 'uses' => 'UserController@create']);

        Route::post('create', ['as' => 'user.store', 'uses' => 'UserController@store']);

        // UPDATE
        Route::get('{id}/edit', ['as' => 'user.edit', 'uses' => 'UserController@edit']);

        //USER PROFILE
        Route::get('/user-profile', ['as' => 'user.profile', 'uses' => 'UserController@profile']);


        Route::put('{id}', ['as' => 'user.update', 'uses' => 'UserController@update'])->where('id',
            '[0-9]+');

        // DELETE
        Route::get('{id}/delete', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);

        Route::get('status', ['as' => 'user.status', 'uses' => 'UserController@status']);


        //change password
        Route::get('setting/change-password', ['as' => 'setting.change.password', 'uses' => 'AuthController@changePassword']);
        Route::POST('setting/update-password', ['as' => 'setting.update.password', 'uses' => 'AuthController@updatePassword']);

    });

});
