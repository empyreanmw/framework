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
                throw new TokenMissmatchException();
            }

            unset($_POST['token']); //removes token index from the $_POST case we dont need it anymore
        }
    }
}