<?php


namespace App\contracts;

interface ConnectionDriverInterface
{
    public function connect(array $connectionInfo);
}