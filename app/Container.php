<?php


namespace App;

use App\traits\Containerable;

abstract class Container
{
    use Containerable;

    public static function make($className)
    {
        if (self::inContainer($className)) {
            return self::get($className);
        }

        return (new AutoDependencyInjection())->create($className);
    }
}