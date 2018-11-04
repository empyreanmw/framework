<?php
return [
    'default' => 'mysql',
   'connections' => [
       'mysql' => [
           'host' => 'mysql:host=localhost',
           'name' => 'framework',
           'username' => 'root',
           'password' => 'secret',
           'driver' => 'mysql'
       ],
       'sqlite' => [
           'path' => '/var/www/framework/storage/test.db',
           'driver' => 'sqlite'
       ],
       'mysql3' => [
           'host' => 'mysql:host=localhost',
           'name' => 'frametest',
           'username' => 'root',
           'password' => 'secret',
           'driver' => 'mysql'
       ],
       'postgres' => [
           'host' => 'localhost',
           'port' => '5432',
           'name' => 'test',
           'username' => 'neljko',
           'password' => 'empyrean',
           'driver' => 'postgres'
       ],
   ],
    'drivers' => [
        'mysql' => core\database\drivers\MySQLConnection::class,
        'sqlite' => core\database\drivers\SQLiteConnection::class,
        'postgres' => core\database\drivers\PostgresConnection::class
    ]
];
