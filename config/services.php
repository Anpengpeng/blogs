<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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

    'weibo' => [
        'client_id'     => '2123193034',
        'client_secret' => '04373eb3268021f9e742ae57010656a6',
        'redirect'      => env('APP_URL').'login/callback/weibo',
    ],

    'qq' => [
        'client_id' => '101074993',
        'client_secret' => 'b6e469024b5989e7803ad2e1bb679318',
        'redirect' => env('APP_URL').'login/callback/qq',
    ],
    'weixinweb' => [
        'client_id' => 'wx0ae286e3de4846a9',
        'client_secret' => '35022b0d4ccd805d822ebed5f7f400a1',
        'redirect' => env('APP_URL').'login/callback/weixinweb',
    ],

];
