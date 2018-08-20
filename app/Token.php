<?php


namespace App;

use Session\Session;

class Token
{
    protected static $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function generate($length)
    {
        Session::instance()->set('token', self::createKey($length));
    }

    public static function get()
    {
        return Session::instance()->get('token');
    }

    protected static function createKey($length)
    {
        $pieces = [];
        $max = mb_strlen(self::$keyspace, '8bit') - 1;

        for ($i = 0; $i < $length; ++$i) {
            $pieces []= self::$keyspace[random_int(0, $max)];
        }

        return implode('', $pieces);
    }
}