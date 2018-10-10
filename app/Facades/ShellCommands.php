<?php


namespace App\Facades;


class ShellCommands extends Facade
{
     public static function getFacadeAccessor()
     {
         return 'App\shell\ShellCommands';
     }
}