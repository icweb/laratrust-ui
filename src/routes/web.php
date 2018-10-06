<?php

Route::model('trusty/users', App\User::class);
Route::resource('trusty/users', 'Icweb\Trusty\App\Http\Controllers\UsersController');

Route::model('trusty/roles', App\Role::class);
Route::resource('trusty/roles', 'Icweb\Trusty\App\Http\Controllers\RolesController');

Route::model('trusty/permissions', App\Permission::class);
Route::resource('trusty/permissions', 'Icweb\Trusty\App\Http\Controllers\PermissionsController');

