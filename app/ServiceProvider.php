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
        View::share('test', function() {
          return  2+2;
        });
        View::share('errors', SessionReader::get(['ValidationErrors']));
        View::share('guests', function(){
            $guests = new Guest();
            return $guests->all();
        });
    }
}