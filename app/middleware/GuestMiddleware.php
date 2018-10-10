<?php


namespace App\middleware;


class GuestMiddleware
{
    public function handle()
    {
        if (auth()->loggedIn()) {
            redirect()->to('home');
        }
    }
}