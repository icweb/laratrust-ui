# Laratrust User Interface

This package provides a user interface for the [santigarcor/laratrust](https://github.com/santigarcor/laratrust) package
___

### Installation

Begin by running the `composer require` command from your terminal.

```json
composer require icweb/trusty
```
___

### Configuration

Publish the vendor files by running the `vendor:publish` command in your terminal

```
php artisan vendor:publish --tag="trusty"
```

If you are using Laravel 5.4 or lower, Add the following provider to your `config\app.php` providers array. Laravel 5.5+ will do this automatically via package discover.

```php
Icwebb\Trusty\TrustyServiceProvider::class
```
___


### Usage

You can view all routes created by this package by running the `route:list` command in your terminal
```
php artisan route:list
```

Or you can type in the following URL into your web browser to get started
```
http://127.0.0.1:8000/trust
```