<?php

namespace core\database;

use App\traits\Singleton;

class Connection
{
    use Singleton;

    protected static $driver;
    protected static $connection;

    public static function make()
    {
        self::$driver = (new ConnectionFactory())->build();

        self::$connection = (self::$driver)->connect();
    }

    public function getDriver()
    {
        return self::$driver;
    }

    public function getConnection()
    {
        return self::$connection;
    }
}