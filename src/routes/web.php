<?php

Route::model('trusty/users', App\User::class);
Route::resource('trusty/users', 'UsersController');

Route::model('trusty/roles', App\Role::class);
Route::resource('trusty/roles', 'RolesController');

Route::model('trusty/permissions', App\Permission::class);
Route::resource('trusty/permissions', 'PermissionsController');

