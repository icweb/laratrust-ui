<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Route Middleware
    |--------------------------------------------------------------------------
    |
    | This array of middleware groups will be applied to the routes of this
    | application. Add middleware here to restrict access to Laratrust UI
    | pages
    |
    */

    'middleware' => ['web', 'auth'],


    /*
    |--------------------------------------------------------------------------
    | ** DO NOT CHANGE **
    | Demo Mode
    |--------------------------------------------------------------------------
    |
    | This setting should be left to the default unless explicitly
    | instructed otherwise
    |
    */

    'demo' => false,

];