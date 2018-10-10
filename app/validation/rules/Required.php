<?php


namespace App\validation\rules;

class Required
{
    use TriesToPassARule;

    protected function rule()
    {
        return $this->value == "";
    }
    protected function setMessage()
    {
        $this->message =  $this->field. ' is required!';
    }
}