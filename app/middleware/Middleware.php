<?php


namespace App\middleware;

use App\contracts\SubjectInterface;
use App\Facades\UserMiddleware;
use App\observers\Logger;
use App\traits\Observerable;

class Middleware
{
    protected $beforeMiddleware = [];
    protected $userMiddleware = [];
    protected $afterMiddleware = [];
    protected $options;

    public function __construct()
    {
        $this->beforeMiddleware = config('Middleware.Before');
        $this->userMiddleware = config('Middleware.User');
        $this->afterMiddleware= config('Middleware.After');
    }

    public function before($controller, $method)
    {
        $this->beforeMiddleware();
        UserMiddleware::handle($controller, $method);
    }

    protected function beforeMiddleware()
    {
        foreach ($this->beforeMiddleware as $middleware) {
            (new $middleware)->handle();
        }
    }

    public function after()
    {
        $this->afterMiddleware();
    }

    protected function afterMiddleware()
    {
        foreach ($this->afterMiddleware as $middleware) {
            (new $middleware)->handle();
        }
    }

}