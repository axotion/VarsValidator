<?php

namespace App\Validator\Rules;

use App\Validator\Rules\Contracts\IRule;

class RequiredRule extends AbstractRule implements IRule
{

    private $string_to_check;
    private $key;

    function __construct(?string $string_to_check, string $key = null)
    {
        $this->string_to_check = $string_to_check;
        $this->key = $key;
    }

    function check(): bool
    {
        return isset($this->string_to_check);
    }

    function message(): string
    {
        return 'Variable '.$this->key.' is not set';
    }
}