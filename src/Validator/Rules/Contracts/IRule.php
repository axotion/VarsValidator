<?php

namespace App\Validator\Rules\Contracts;

interface IRule
{
    function check(): bool;

    function message(): string;

    function getNameOfClass(): string;
}