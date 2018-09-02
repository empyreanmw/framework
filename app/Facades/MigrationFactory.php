<?php


namespace App\Facades;


class MigrationFactory extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'core\database\MigrationFactory';
    }
}