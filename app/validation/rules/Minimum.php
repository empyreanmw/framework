<?php


namespace App\validation\rules;

class Minimum
{
    use TriesToPassARule;

    protected function rule()
    {
       return strlen($this->value) < $this->options;
    }

    protected function setMessage()
    {
        $this->message = $this->field. ' must be at least '.$this->options.' characters long!';
    }
}