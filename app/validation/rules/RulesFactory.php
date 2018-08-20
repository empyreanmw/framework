<?php


namespace App\validation\rules;


class RulesFactory
{
    protected $rules = [
        'min' => Minimum::class,
        'required' => Required::class,
       ];

    public function create($rule, $value, $field, $options)
    {
        return new $this->rules[$rule]($value, $field, $options);
    }
}