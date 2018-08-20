<?php


namespace App\validation;


class RuleParser
{
    public static function parse($rules)
    {
        $parsedRules = explode("|", $rules);

        return self::checkForOptions($parsedRules);
    }

    protected static function checkForOptions($rules)
    {
        foreach ($rules as $rule) {

            $explodedRule = explode(":", $rule);

            $rulesWithOptions[] = count($explodedRule) >= 2 ? ['name' => $explodedRule[0], 'options' => $explodedRule[1]] : ['name' => $rule, 'options' => null];
        }

        return $rulesWithOptions;
    }
}