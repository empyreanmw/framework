<?php


namespace App\Facades;


class QueryBuilder extends Facade
{
    public static function getFacadeAccessor()
    {
        return "core\database\QueryBuilder";
    }
}