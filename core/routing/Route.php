<?php
use \App\controllers\ControllerDispatcher;

class Route
{
    protected $middleware;
    protected $route;
    protected $method;
    protected $controller;
    protected $action;
    protected $controllerDispatcher;
    protected $routes;
    /**
     * Route constructor.
     * @param $route
     */
    public function __construct($route, $method, $routes)
    {
        $this->routes = $routes;
        $this->route = $route;
        $this->method = $method;
        $this->controllerDispatcher = new ControllerDispatcher();
    }

    public function run()
    {
        $this->routeExists()
            ->parseRoute()
            ->runController();
    }

    protected function routeExists()
    {
        if(!key_exists($this->route, $this->routes[$this->method])){
            throw new Exception("No routes registered for this URI");
        }

        return $this;
    }

    protected function parseRoute()
    {
        list($this->controller, $this->action) = explode("@", $this->routes[$this->method][$this->route]);

        return $this;
    }

    protected function runController()
    {
        $this->getController()->dispatchController();
    }

    protected function dispatchController()
    {
        $this->controllerDispatcher->dispatch($this->controller, $this->action);
    }

    protected function getController()
    {
        $controller = 'App\\controllers\\'.$this->controller;

        $this->controller = new $controller;

        return $this;
    }
}