<?php

namespace core\database;

use App\Config;

class ConnectionFactory
{
    protected $drivers;
    protected $connection;

    public function __construct()
    {
        $this->connection = config('Connection');
        $this->drivers = Config::grab('database')->get('drivers.'.$this->connection);
    }

    public function build()
    {
        return new $this->drivers;
    }



}