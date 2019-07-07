# Laratrust User Interface

This package provides a user interface for the [santigarcor/laratrust](https://github.com/santigarcor/laratrust) package
___

### Table of Contents
- [Installation](#Installation)  
- [Configuration](#Configuration)  
- [Usage](#Usage)  
- [Route Middleware](#RouteMiddleware)  
- [TODO](#TODO)  

___

### Requirements

This package requires you have the package `santigarcor/laratrust:5.2.*` installed on at least version `5.2.*`

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

If you are using Laravel 5.4 or lower, add the following provider to your `config\app.php` providers array. Laravel 5.5+ will do this automatically via package discover.

```php
Icwebb\Trusty\App\Providers\TrustyServiceProvider::class
```
___

<a name="Usage"/>

### Usage

You can view all routes created by this package by running the `route:list` command in your terminal
```
php artisan route:list
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

<a name="TODO"/>

### TODO
