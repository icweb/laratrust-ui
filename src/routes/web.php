<?php

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('trust', 'TrustyController@index');

    Route::group(['prefix' => 'trust'], function(){

        Route::model('users', App\User::class);
        Route::resource('users', 'Icweb\Trusty\App\Http\Controllers\UsersController');

        Route::model('roles', App\Role::class);
        Route::resource('roles', 'Icweb\Trusty\App\Http\Controllers\RolesController');

        Route::model('permissions', App\Permission::class);
        Route::resource('permissions', 'Icweb\Trusty\App\Http\Controllers\PermissionsController');

    });

});
