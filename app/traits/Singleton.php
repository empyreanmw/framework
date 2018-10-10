<?php


namespace App\traits;


trait Singleton
{
    protected static $instance;

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

}