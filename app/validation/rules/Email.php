<?php


namespace App\validation\rules;


class Email
{
    use TriesToPassARule;

    protected function rule()
    {
        return !filter_var($this->value, FILTER_VALIDATE_EMAIL);
    }

    protected function setMessage()
    {
        $this->message = "You must provide a correct email address!";
    }
}