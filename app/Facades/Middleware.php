<?php


namespace App\Facades;


class Middleware extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'App\middleware\Middleware';
    }
}