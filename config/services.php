<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
        'client_id' => '165038444428-ih7miv73np63p26cistvu92dljssg1kc.apps.googleusercontent.com',
        'client_secret' => 'jyJoFcBz9t3EL5qMDJj6aFDo',
        'redirect' => 'http://127.0.0.1/callback/google',
    ],
    'facebook' => [
        'client_id' => '1822624078003756',
        'client_secret' => '4a6108dd566e712d74dc06b7334c7ffe',
        'redirect' => 'http://127.0.0.1/callback/facebook',
    ],

];
