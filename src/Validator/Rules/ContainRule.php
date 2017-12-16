<?php

namespace App\Validator\Rules;

use App\Validator\Rules\Contracts\IRule;

class ContainRule extends AbstractRule implements IRule
{

    private $string_to_check;
    private $word;

    function __construct(string $string_to_check, string $word)
    {
        $this->string_to_check = $string_to_check;
        $this->word = $word;
    }

    function check(): bool
    {
        return strpos($this->string_to_check, $this->word) !== false;
    }

    function message(): string
    {
        return 'Word ' . $this->word . ' has been not found';
    }
}