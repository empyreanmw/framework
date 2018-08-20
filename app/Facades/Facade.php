<?php


namespace App\Facades;
use App\App;

abstract class Facade
{
    protected static abstract function getFacadeAccessor();

    protected static function getInstance()
    {
        return App::make(static::getFacadeAccessor());
    }

    public static function __callStatic($name, $arguments)
    {
        $instance = static::getInstance();

        return $instance->$name(...$arguments);
    }
}