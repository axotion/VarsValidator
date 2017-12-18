<?php

namespace App\Validator;

use App\Validator\Rules\Contracts\IRule;

class Validator
{
    protected $fails = [];
    protected $messages = [];

    public function validate(IRule $rule, $key)
    {
        if ($rule->check()) {
            $this->fails[] = false;
        } else {
            $this->fails[] = true;
            $this->messages['errors'][$key][][$rule->getNameOfClass()] = $rule->message();
        }
        return $this;
    }

    public function fails(): bool
    {
        foreach ($this->fails as $fail) {
            if ($fail) return true;
        }
        return false;
    }

    public function messages(): array
    {
        return $this->messages;
    }
}