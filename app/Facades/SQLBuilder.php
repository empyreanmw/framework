<?php


namespace App\Facades;


class SQLBuilder extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'core\database\SQLBuilder';
    }
}