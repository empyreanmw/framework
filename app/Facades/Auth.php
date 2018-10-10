<?php


namespace App\Facades;


class Auth extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'App\Auth\Auth';
    }
}