<?php
return [
    'Database' => [
            'connection' => 'mysql:host=localhost',
            'name' => 'framework',
            'username' => 'root',
            'password' => 'secret',
        ],
    'Middleware' => [
            'User' => [
                'Test' => App\middleware\TestMiddleware::class
            ],
            'Before' => [
                 App\middleware\AnotherTestMiddleware::class,
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