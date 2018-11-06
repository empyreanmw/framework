<?php

namespace App\shell;

use App\Facades\ShellCommands;
use core\database\Connection;

class DriverConsoleScriptFactory
{
    protected $drivers = [
        'mysql' => MySQLScript::class,
        'sqlite' => SqliteScript::class,
        'pgsql' => PostgresScript::class
    ];

    protected $connectionDriver;
    protected $file;
    protected $connection;

    public function __construct(Connection $connection, $file)
    {
        $this->connection = $connection;
        $this->file = $file;
        $this->connectionDriver = $this->connection->make()->getAttribute(\PDO::ATTR_DRIVER_NAME);
    }

    public function build()
    {
        ShellCommands::execute(new $this->drivers[$this->connectionDriver], $this->file, $this->connection);
    }
}