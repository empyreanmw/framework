<?php


namespace App\Exceptions;


class TokenMissmatchException extends LoggableException
{
    public $message = "Token missmatch";
}