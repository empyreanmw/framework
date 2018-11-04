<?php

namespace core\database;

class Connection
{
    protected $name;

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    public function make()
    {
        return (new ConnectionFactory($this))->build();
    }

    public function getConnectionName()
    {
        return $this->name;
    }

}