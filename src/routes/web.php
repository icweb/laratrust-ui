<?php

Route::group(['middleware' => config('trusty.middleware')], function () {

    Route::get('trust', 'Icweb\Trusty\App\Http\Controllers\TrustyController@index')->name('trusty.index');

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
                'store' => 'trusty.users.store',
            ]
        ]);

        Route::model('roles', App\Role::class);
        Route::resource('roles', 'Icweb\Trusty\App\Http\Controllers\RolesController', [
            'names' => [
                'index' => 'trusty.roles.index',
                'show' => 'trusty.roles.show',
                'read' => 'trusty.roles.read',
                'update' => 'trusty.roles.update',
                'create' => 'trusty.roles.create',
                'destroy' => 'trusty.roles.destroy',
                'edit' => 'trusty.roles.edit',
                'store' => 'trusty.roles.store',
            ]
        ]);

        Route::model('permissions', App\Permission::class);
        Route::resource('permissions', 'Icweb\Trusty\App\Http\Controllers\PermissionsController', [
            'names' => [
                'index' => 'trusty.permissions.index',
                'show' => 'trusty.permissions.show',
                'read' => 'trusty.permissions.read',
                'update' => 'trusty.permissions.update',
                'create' => 'trusty.permissions.create',
                'destroy' => 'trusty.permissions.destroy',
                'edit' => 'trusty.permissions.edit',
                'store' => 'trusty.permissions.store',
            ]
        ]);

    });

});
