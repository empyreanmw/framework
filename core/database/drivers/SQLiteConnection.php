<?php

namespace core\database\drivers;

use App\Config;
use App\contracts\ConnectionDriverInterface;
use App\Facades\ShellCommands;
use App\shell\SqliteScript;

class SQLiteConnection implements ConnectionDriverInterface
{
    protected $pdo;

    public function connect($connectionInfo)
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . $connectionInfo['path']);
        }

        return $this->pdo;
    }
}