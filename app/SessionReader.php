<?php


namespace App;

use Session\Session;

class SessionReader
{
    public static function get($keys)
    {
        foreach ($keys as $key) {
            $result = Session::instance()->get($key);
        }

        return $result;
    }
}