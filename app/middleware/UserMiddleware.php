<?php


namespace App\middleware;


class UserMiddleware extends Middleware
{
    protected $allowedMiddleware = [];
    
    public function handle($controller, $method)
    {
        $this->parseUserMiddleware(
            $controller->getMiddleware(), $method
        )
            ->triggerUserMiddleware();
    }

    protected function parseUserMiddleware($middlewareArray, $method)
    {
        if (!empty($middlewareArray)) {
            foreach ($middlewareArray as $m) {
                if (isset($m['options']['except'][0]) && $m['options']['except'][0] != $method) {
                    array_push($this->allowedMiddleware, $m['middleware']);
                }
                if (isset($m['options']['only'][0]) && $m['options']['only'][0] == $method) {
                    array_push($this->allowedMiddleware, $m['middleware']);
                }
                else{
                    array_push($this->allowedMiddleware, $m['middleware']);
                }
            }
        }

        return $this;
    }

    protected function triggerUserMiddleware()
    {
        foreach ($this->allowedMiddleware as $m) {
            (new $this->userMiddleware[$m])->handle();
        }
    }
}