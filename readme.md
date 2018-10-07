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

If you are using Laravel 5.5+, you can skip this step.

Add the following provider to your `config\app.php` providers array.

```php
Icwebb\Trusty\TrustyServiceProvider::class
```
___


### Usage

You can view all routes created by this package by running the `route:list` command in your terminal
```php
php artisan rotue:list
```

Or you can type in the following URL into your web browser to get started
```
http://127.0.0.1:8000/trust
```