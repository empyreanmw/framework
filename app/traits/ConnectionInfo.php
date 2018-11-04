<?php


namespace App\traits;
use App\Config;

trait ConnectionInfo
{
    protected $connectionInfo;

    protected function getConnectionInfo($connection)
    {
        $default = Config::grab('database')->get('default');

        if (!$connection->getConnectionName()) {
            $this->connectionInfo = Config::grab('database')->get('connections.'.$default);
        }

        else{
            $this->connectionInfo = Config::grab('database')->get('connections.'.$connection->getConnectionName());
        }
    }
}