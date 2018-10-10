<?php


namespace App\Exceptions;


class ContainerResolveException extends LoggableException
{
    public $message = "Could not resolve key in container";
}