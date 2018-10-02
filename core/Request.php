<?php

use App\validation\Validator;
use App\Facades\Hash;

class Request
{
    public static function URI()
    {
        $uri = $_SERVER['REQUEST_URI'];

        return trim($uri, '/');
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function input($field = null)
    {
        if ($field) {
            return $_POST[$field];
        }

        return $_POST;
    }

    public function validate($data)
    {
        return (new Validator($this))->validate($data);
    }

    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == "POST" ? true : false;
    }

    public function hashPassword()
    {
        if (array_key_exists('password', $_POST)) {
           $_POST['password'] = Hash::make($_POST['password']);
        }
    }
}