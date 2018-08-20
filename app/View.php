<?php

namespace App;
use App\traits\Containerable;

class View
{
    use Containerable;

    public static function get($name, $parameters = [])
    {
        extract(self::$container);

        extract($parameters);

        require 'views/view.'.$name.'.php';
    }

    public static function share($key, $value)
    {
        self::bind($key, $value);
    }
}