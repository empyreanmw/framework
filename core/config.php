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