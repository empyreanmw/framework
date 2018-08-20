<?php


namespace App\middleware;


use App\Exceptions\TokenMissmatchException;
use App\Token;

class VerifyToken
{
    protected $token;
    protected $request;
    /**
     * VerifyToken constructor.
     * @param $token
     */
    public function __construct()
    {
        $this->request = new \Request();
    }

    public function handle()
    {
        if ($this->request->isPost()) {
            if(request()->input('token') !== Token::get()) {
                throw new TokenMissmatchException('Token missmatch!');
            }
        }
    }
}