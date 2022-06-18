<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '1018057165064-cdevn084tph4pru49t01p4gd1ka690ru.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/google/login',
    ],
    'facebook' => [
        'client_id' => '685724605819076',
        'client_secret' => '06caac85657af362d7380543f2dee851',
        'redirect' => 'http://localhost:8000/facebook/login',
    ],

];
