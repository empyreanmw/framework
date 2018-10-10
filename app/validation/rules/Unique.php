<?php


namespace App\validation\rules;


use App\Facades\QueryBuilder;

class Unique
{
    use TriesToPassARule;

    public function rule()
    {
        return QueryBuilder::exists($this->options, $this->value, $this->field);
    }

    public function setMessage()
    {
        $this->message = $this->value. " already exists! Please use a different ".$this->field;
    }
}