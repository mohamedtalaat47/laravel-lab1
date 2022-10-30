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

    'github' => [
        'client_id' => 'e4f41d81a91c0bd87120',
        'client_secret' => '1784843ceccd3303a185f136ba4d35d6f42d0bf2',
        'redirect' => 'http://127.0.0.1:8000/auth/callback',
    ],

    'google' => [  
        'client_id' => '779332955679-uksesh1f8lf45qmltv9ihe37kjr38svc.apps.googleusercontent.com',  
        'client_secret' => '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',  
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',  
    ],  
];
