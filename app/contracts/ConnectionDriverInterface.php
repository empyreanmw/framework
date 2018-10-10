<?php


namespace App\contracts;


interface ConnectionDriverInterface
{
    public function executeSQL($file);
    public function connect();
}