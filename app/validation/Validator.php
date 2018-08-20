<?php

namespace App\validation;


use App\validation\rules\RulesFactory;

class Validator
{
    protected $request;
    /**
     * Validator constructor.
     */
    public function __construct(\Request $request)
    {
        $this->request = $request;
        $this->Rules = new RulesFactory();
    }

    public function validate($data)
    {
        $this->rules($data);
    }

    protected function rules($data)
    {
        foreach ($data as $key => $d) {
           $this->applyRules($d, $this->request->input()[$key], $key);
        }
    }

    protected function applyRules($rules, $value, $field)
    {
        foreach (RuleParser::parse($rules) as $rule) {
            $this->Rules
                ->create($rule['name'], $value, $field, $options = $rule['options'])
                ->passes();
        }
    }
}