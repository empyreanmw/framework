<?php


namespace App\validation;


class ValidationErrors
{
    protected static $messages = [];
    protected static $instance = null;

    public static function instance() {
        if (is_null(self::$instance)) { self::$instance = new self(); }
        return self::$instance;
    }

    public function add($message)
    {
        array_push(self::$messages, $message);
    }

    public function all()
    {
        return self::$messages;
    }
}