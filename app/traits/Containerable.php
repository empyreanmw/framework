<?php

namespace App\traits;
use App\Exceptions\ContainerResolveException;

trait Containerable
{
    protected static $container = [];

    public static function get($key)
    {
        if (!self::inContainer($key)) {
            throw new ContainerResolveException();
        }

        return self::$container[$key];
    }

    protected static function inContainer($key)
    {
        return key_exists($key, self::$container);
    }

    public static function bind($key, $value)
    {
        $value instanceof \Closure ? self::$container[$key] = $value() : self::$container[$key] = $value;
    }
}
