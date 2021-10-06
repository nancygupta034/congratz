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
        'client_id' => '522937805806284',
        'client_secret' => '5ab881954d3a19166be889242fe4a320',
        'redirect' => 'https://congratz.beesmartitsolutions.com/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '253974584182-8qotcqd262kn3rrshlvtuqe752umsimk.apps.googleusercontent.com',
        'client_secret' => 'TyGHeuEwvQBvM8alcIktDk9A',
        'redirect' => 'https://www.sayaansh.com/auth/google/callback',
    ],

];
