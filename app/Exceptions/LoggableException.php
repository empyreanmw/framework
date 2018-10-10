<?php


namespace App\Exceptions;


class LoggableException extends \Exception
{
    public function __construct()
    {
        error_log($this->__toString(), 3, '/var/www/framework/storage/errors.log');
    }
}