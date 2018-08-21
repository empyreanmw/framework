<?php

namespace App;

use core\database\Connection;

class ServiceProvider
{
    public function register()
    {
        App::bind('config', dot(require 'core/config.php'));
        App::bind('db', Connection::make());
        App::bind('router', function(){
            return new \Router(\Request::URI(), \Request::method());
        });

        return $this;
    }

    public function boot()
    {
        View::share('errors', SessionReader::get(['ValidationErrors']));
    }
}