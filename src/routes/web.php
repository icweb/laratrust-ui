<?php

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('trust', 'Icweb\Trusty\App\Http\Controllers\TrustyController@index')->name('trust.index');

    Route::group(['prefix' => 'trust'], function(){

        Route::model('users', App\User::class);
        Route::resource('users', 'Icweb\Trusty\App\Http\Controllers\UsersController', [
            'names' => [
                'index' => 'trusty.users.index',
                'show' => 'trusty.users.show',
                'read' => 'trusty.users.read',
                'update' => 'trusty.users.update',
                'create' => 'trusty.users.create',
                'destroy' => 'trusty.users.destroy',
                'edit' => 'trusty.users.edit',
            ]
        ]);

        Route::model('roles', App\Role::class);
        Route::resource('roles', 'Icweb\Trusty\App\Http\Controllers\RolesController');

        Route::model('permissions', App\Permission::class);
        Route::resource('permissions', 'Icweb\Trusty\App\Http\Controllers\PermissionsController');

    });

});
