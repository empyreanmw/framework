<?php

class Router
{
    protected $routes = ['GET' => [], 'POST' => []];
    protected $route;

    /**
     * Router constructor.
     */
    public function __construct($URI, $method)
    {
        $this->registerRoutes();
        $this->route = new Route($URI, $method, $this->routes);
    }

    protected function registerRoutes()
    {
        $router = $this;

        require __DIR__.'/routes.php';
    }

    public function get($keys)
    {
        $this->routes["GET"] += $keys;
    }

    public function post($keys)
    {
        $this->routes["POST"] += $keys;
    }

    public function direct()
    {
        $this->route->run();
    }
}