<?php
return [
    'Connection' => 'sqlite',
    'Middleware' => [
            'User' => [
                'Test' => App\middleware\TestMiddleware::class,
                'Auth' => App\middleware\AuthMiddleware::class,
                'Guest' => App\middleware\GuestMiddleware::class
            ],
            'Before' => [
                 App\middleware\SetToken::class,
                 App\middleware\VerifyToken::class
                ],
            'After' => [
                App\middleware\SendsValidationErrors::class
            ]
    ],
    'debug' => true,
    'env' => 'dev'
];