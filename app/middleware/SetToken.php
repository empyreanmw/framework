<?php


namespace App\middleware;

use App\Token;

class SetToken
{
    public function handle()
    {
        if (!request()->isPost())
            Token::generate(32);
    }
}