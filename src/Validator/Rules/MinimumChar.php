<?php

namespace App\Validator\Rules;

use App\Validator\Rules\Contracts\IRule;

class MinimumChar extends AbstractRule implements IRule
{
    private $string_to_check;
    private $length;

    function __construct(string $string_to_check, int $min_length)
    {
        $this->string_to_check = $string_to_check;
        $this->length = $min_length;
    }

    function check(): bool
    {
        return strlen($this->string_to_check) >= $this->length;
    }

    function message(): string
    {
        return 'Passed variable must be greater than ' . $this->length;
    }
}