<?php


namespace App\validation\rules;


class RulesFactory
{
    protected $rules = [
        'min' => Minimum::class,
        'required' => Required::class,
        'email' => Email::class,
        'unique' => Unique::class
       ];

    public function create($rule, $value, $field, $options)
    {
        return new $this->rules[$rule]($value, $field, $options);
    }
}