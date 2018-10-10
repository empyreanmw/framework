<?php

namespace App;

class ServiceProvider
{
    public function register()
    {
        App::bind('config', dot(require 'core/config/app.php'));

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
    }
}