<?php

Route::model('users', App\User::class);
Route::resource('users', 'UsersController');

Route::model('roles', App\Role::class);
Route::resource('roles', 'RolesController');

Route::model('permissions', App\Permission::class);
Route::resource('permissions', 'PermissionsController');

