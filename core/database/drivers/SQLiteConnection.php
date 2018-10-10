<?php

namespace core\database\drivers;

use App\Config;
use App\contracts\ConnectionDriverInterface;
use App\Facades\ShellCommands;
use App\shell\SqliteScript;

class SQLiteConnection implements ConnectionDriverInterface
{
    protected $pdo;

    public function connect()
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . Config::grab('database')->get('connections.sqlite.path'));
        }

        return $this->pdo;
    }
    public function executeSQL($file)
    {
        ShellCommands::execute(new SqliteScript(), $file);
    }

}