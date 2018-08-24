<?php


namespace App\Exceptions;


class ObserverContractException extends LoggableException
{
    public $message = "Class must be instance of ObserverInterface";
}