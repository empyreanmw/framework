<?php


namespace App\controllers;

use App\Facades\Middleware;

class ControllerDispatcher
{
    public function dispatch($controller, $method)
    {
        Middleware::before($controller, $method);

        $controller->callAction($method);

        Middleware::after();
    }
}