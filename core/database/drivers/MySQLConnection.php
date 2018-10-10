<?php

namespace core\database\drivers;

use App\Config;
use App\contracts\ConnectionDriverInterface;
use App\shell\MySQLScript;
use App\Facades\ShellCommands;

class MySQLConnection implements ConnectionDriverInterface
{
    public function connect()
    {
        $database = Config::grab('database')->get('connections.mysql');

        try {
            $conn = new \PDO("{$database['host']};dbname={$database['name']}", $database['username'], $database['password']);
        }
        catch(\PDOException $e)
        {
            echo "Connection failed";
        }

        return $conn;
    }

    public function executeSQL($file)
    {
        ShellCommands::execute(new MySQLScript(), $file);
    }
}