<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'facebook' => [
        'client_id' => '252359969503316',
        'client_secret' => '28667e2a4ce00653aea0e76c750b0442',
        'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback',
    ],
    'twitter' => [
        'client_id' => 'xxxx',
        'client_secret' => '28667e2a4ce00653aea0e76c750b0442',
        'redirect' => 'https://www.tutsmake.com/laravel-example/callback/facebook',
    ],
    'google' => [
        'client_id' => 'xxxx',
        'client_secret' => 'xxx',
        'redirect' => 'https://www.tutsmake.com/laravel-example/callback/facebook',
    ],
];
