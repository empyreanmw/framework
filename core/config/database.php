<?php
return [
   'connections' => [
       'mysql' => [
           'host' => 'mysql:host=localhost',
           'name' => 'framework',
           'username' => 'root',
           'password' => 'secret',
       ],
       'sqlite' => [
           'path' => '/var/www/framework/storage/test.db'
       ]
   ],
    'drivers' => [
        'mysql' => core\database\drivers\MySQLConnection::class,
        'sqlite' => core\database\drivers\SQLiteConnection::class
    ]
];
