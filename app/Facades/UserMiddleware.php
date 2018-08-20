<?php


namespace App\Facades;


class UserMiddleware extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\middleware\UserMiddleware';
    }
}