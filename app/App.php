<?php

namespace App;

use core\database\Connection;

class App extends Container
{
    protected $serviceProvider;
    protected $debug;
    /**
     * App constructor.
     */
    public function __construct(ServiceProvider $serviceProvider)
    {
        $this->serviceProvider = $serviceProvider;
    }

    public function bootProvider()
    {
        $this->serviceProvider
            ->register()
            ->boot();
    }

    public function run()
    {
        $this->setMode()
             ->make('router')
             ->direct();
    }

    protected function setMode()
    {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

        return $this;
    }
}
