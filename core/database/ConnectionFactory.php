<?php

namespace core\database;

use App\Config;
use App\traits\ConnectionInfo;

class ConnectionFactory
{
    use ConnectionInfo;

    protected $drivers = [];
    protected $connection;
    protected $default;

    public function __construct(Connection $connection)
    {
        $this->getConnectionInfo($connection);
        $this->drivers = Config::grab('database')->get('drivers');
    }

    public function build()
    {
        return (new $this->drivers[$this->connectionInfo['driver']])->connect($this->connectionInfo);
    }
}