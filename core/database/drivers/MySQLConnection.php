<?php

namespace core\database\drivers;

use App\Config;
use App\contracts\ConnectionDriverInterface;
use App\shell\MySQLScript;
use App\Facades\ShellCommands;

class MySQLConnection implements ConnectionDriverInterface
{
    public function connect($connectionInfo)
    {
        try {
            $conn = new \PDO("{$connectionInfo['host']};dbname={$connectionInfo['name']}", $connectionInfo['username'], $connectionInfo['password']);
        }
        catch(\PDOException $e)
        {
            echo "Connection failed";
        }

        return $conn;
    }
}