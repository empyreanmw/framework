<?php


namespace App\middleware;


class AuthMiddleware
{
    public function handle()
    {
            if (!auth()->loggedIn()){
            redirect()->to('login');
        }
    }
}