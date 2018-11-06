<?php


namespace App\Exceptions;


class NonexistentConnectionException extends LoggableException
{
    public $message = "Provided connection name does not exist.";
}