<?php


namespace App\middleware;


use App\validation\ValidationErrors;
use Session\Session;

class SendsValidationErrors
{
    public function handle()
    {
        Session::instance()->set("ValidationErrors", ValidationErrors::instance()->all());
    }
}