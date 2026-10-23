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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google' => [
        'routes_api_key' => env('GOOGLE_MAPS_ROUTES_API_KEY'),
    ],

    'admin' => [
        'email' => env('ADMIN_EMAIL', 'tcsmarttechnology@gmail.com'),
    ],

    'courier' => [
        'default' => env('COURIER_DEFAULT_PROVIDER', 'manual'),
    ],

    'shiprocket' => [
        'api_base' => env('SHIPROCKET_API_BASE', 'https://apiv2.shiprocket.in/v1/external'),
        'email' => env('SHIPROCKET_EMAIL'),
        'password' => env('SHIPROCKET_PASSWORD'),
        'pickup_pincode' => env('SHIPROCKET_PICKUP_PINCODE', '110025'),
        'pickup_location' => env('SHIPROCKET_PICKUP_LOCATION', 'Primary'),
    ],

    'delhivery' => [
        'api_key' => env('DELHIVERY_API_KEY'),
        'client_name' => env('DELHIVERY_CLIENT_NAME'),
        'api_base' => env('DELHIVERY_API_BASE', 'https://track.delhivery.com/api'),
    ],

];
