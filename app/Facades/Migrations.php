<?php


namespace App\Facades;


class Migrations extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'core\database\MigrationExecutor';
    }
}