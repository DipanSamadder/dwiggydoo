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
    'facebook' => [
        'client_id' => '238845648798106',
        'client_secret' => 'dbf52d000024cde4f67173a08dfc6b53',
        'redirect' => 'https://socialite.oyeber.com/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '686901138003-ob8n48uo20sfropfrm7j6hfgmiupss5m.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://socialite.oyeber.com/login/google/callback',
    ],
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

];
