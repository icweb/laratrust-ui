# Laratrust User Interface

This package provides a user interface for the [santigarcor/laratrust](https://github.com/santigarcor/laratrust) package
___

### Table of Contents
- [Requirements](#Requirements) 
- [Installation](#Installation)  
- [Configuration](#Configuration)  
- [Usage](#Usage)  
- [Route Middleware](#RouteMiddleware) 
- [Screenshots](#Screenshots)   
- [TODO](#TODO)  

___

<a name="Requirements"/>

### Requirements

This package requires you have the package `santigarcor/laratrust` installed on at least version `5.2.*`

___

<a name="Installation"/>

### Installation

Begin by running the `composer require` command from your terminal.

```json
composer require icweb/trusty
```
___

<a name="Configuration"/>

### Configuration

If you are using Laravel 5.4 or lower, add the following provider to your `config\app.php` providers array. Laravel 5.5+ will do this automatically via package discover.

```php
Icwebb\Trusty\App\Providers\TrustyServiceProvider::class
```

Publish the vendor files by running the `vendor:publish` command in your terminal

```
php artisan vendor:publish --tag="trusty"
```

The following files will be published:
```
/config
    - trusty.php
    
/resources/views/vendor/trusty
    - index.blade.php    
    /layouts
        - trusty.blade.php
    /permissions
        - create.blade.php
        - edit.blade.php
        - index.blade.php
        - show.blade.php
    /roles
        - create.blade.php
        - edit.blade.php
        - index.blade.php
        - show.blade.php
    /users
        - create.blade.php
        - edit.blade.php
        - index.blade.php
        - show.blade.php
```
___

<a name="Usage"/>

### Usage

You can view all routes created by this package by running the `route:list` command in your terminal
```
php artisan route:list
```

```
+-----------+-------------------------------------+----------------------------+------------------------------------------------------------------------+--------------+
| Method    | URI                                 | Name                       | Action                                                                 | Middleware   |
+-----------+-------------------------------------+----------------------------+------------------------------------------------------------------------+--------------+
| GET|HEAD  | trust                               | trusty.index               | Icweb\Trusty\App\Http\Controllers\TrustyController@index               | web,auth     |
| POST      | trust/permissions                   | trusty.permissions.store   | Icweb\Trusty\App\Http\Controllers\PermissionsController@store          | web,auth     |
| GET|HEAD  | trust/permissions                   | trusty.permissions.index   | Icweb\Trusty\App\Http\Controllers\PermissionsController@index          | web,auth     |
| GET|HEAD  | trust/permissions/create            | trusty.permissions.create  | Icweb\Trusty\App\Http\Controllers\PermissionsController@create         | web,auth     |
| GET|HEAD  | trust/permissions/{permission}      | trusty.permissions.show    | Icweb\Trusty\App\Http\Controllers\PermissionsController@show           | web,auth     |
| PUT|PATCH | trust/permissions/{permission}      | trusty.permissions.update  | Icweb\Trusty\App\Http\Controllers\PermissionsController@update         | web,auth     |
| DELETE    | trust/permissions/{permission}      | trusty.permissions.destroy | Icweb\Trusty\App\Http\Controllers\PermissionsController@destroy        | web,auth     |
| GET|HEAD  | trust/permissions/{permission}/edit | trusty.permissions.edit    | Icweb\Trusty\App\Http\Controllers\PermissionsController@edit           | web,auth     |
| POST      | trust/roles                         | trusty.roles.store         | Icweb\Trusty\App\Http\Controllers\RolesController@store                | web,auth     |
| GET|HEAD  | trust/roles                         | trusty.roles.index         | Icweb\Trusty\App\Http\Controllers\RolesController@index                | web,auth     |
| GET|HEAD  | trust/roles/create                  | trusty.roles.create        | Icweb\Trusty\App\Http\Controllers\RolesController@create               | web,auth     |
| PUT|PATCH | trust/roles/{role}                  | trusty.roles.update        | Icweb\Trusty\App\Http\Controllers\RolesController@update               | web,auth     |
| DELETE    | trust/roles/{role}                  | trusty.roles.destroy       | Icweb\Trusty\App\Http\Controllers\RolesController@destroy              | web,auth     |
| GET|HEAD  | trust/roles/{role}                  | trusty.roles.show          | Icweb\Trusty\App\Http\Controllers\RolesController@show                 | web,auth     |
| GET|HEAD  | trust/roles/{role}/edit             | trusty.roles.edit          | Icweb\Trusty\App\Http\Controllers\RolesController@edit                 | web,auth     |
| GET|HEAD  | trust/users                         | trusty.users.index         | Icweb\Trusty\App\Http\Controllers\UsersController@index                | web,auth     |
| POST      | trust/users                         | trusty.users.store         | Icweb\Trusty\App\Http\Controllers\UsersController@store                | web,auth     |
| GET|HEAD  | trust/users/create                  | trusty.users.create        | Icweb\Trusty\App\Http\Controllers\UsersController@create               | web,auth     |
| DELETE    | trust/users/{user}                  | trusty.users.destroy       | Icweb\Trusty\App\Http\Controllers\UsersController@destroy              | web,auth     |
| PUT|PATCH | trust/users/{user}                  | trusty.users.update        | Icweb\Trusty\App\Http\Controllers\UsersController@update               | web,auth     |
| GET|HEAD  | trust/users/{user}                  | trusty.users.show          | Icweb\Trusty\App\Http\Controllers\UsersController@show                 | web,auth     |
| GET|HEAD  | trust/users/{user}/edit             | trusty.users.edit          | Icweb\Trusty\App\Http\Controllers\UsersController@edit                 | web,auth     |
+-----------+-------------------------------------+----------------------------+------------------------------------------------------------------------+--------------+

```

Or you can type in the following URL into your web browser to get started
```
http://127.0.0.1:8000/trust
```

<a name="RouteMiddleware"/>

#### Route Middleware

This package allows you to customize the middleware groups that are applied to the routes. To change the default middleware groups, visit the `config/trust.php` config file. Out of the box, the `web` and `auth` middleware groups are applied.
```php
'middleware' => ['web', 'auth'],
```
___

<a name="Screenshots"/>

### Screenshots

Users Index:
![screely-1562522993648](https://user-images.githubusercontent.com/43120665/60772201-13a19680-a0c1-11e9-8e2b-e6b417baef98.png)

User Show:
![screely-1562523001593](https://user-images.githubusercontent.com/43120665/60772202-13a19680-a0c1-11e9-9108-5c41ae09cd40.png)

User Edit:
![screely-1562523018730](https://user-images.githubusercontent.com/43120665/60772203-143a2d00-a0c1-11e9-96fe-1b344d0f4810.png)

Roles Index:
![screely-1562523028116](https://user-images.githubusercontent.com/43120665/60772204-143a2d00-a0c1-11e9-99c9-615778564a3e.png)

Role Show:
![screely-1562523045843](https://user-images.githubusercontent.com/43120665/60772205-143a2d00-a0c1-11e9-8ce3-f9dfa2226bbe.png)

Permissions Index:
![screely-1562523060466](https://user-images.githubusercontent.com/43120665/60772206-143a2d00-a0c1-11e9-8fcc-9801774554ec.png)

___

<a name="TODO"/>

### TODO
