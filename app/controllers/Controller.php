<?php


namespace App\controllers;
use App\middleware\ControllerMiddlewareOptions;
use App\ReflectionMethod;

class Controller
{
    protected $middleware;

    public function middleware($middleware, array $options = [])
    {
        foreach ((array) $middleware as $m) {
            $this->middleware[] = [
                'middleware' => $m,
                'options' => &$options,
            ];
        }

        return new ControllerMiddlewareOptions($options);
    }

    public function getMiddleware()
    {
        return $this->middleware;
    }

    public function callAction($method)
    {
        (new ReflectionMethod($this, $method))->callMethod();
    }


}