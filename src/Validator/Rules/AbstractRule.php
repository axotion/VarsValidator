<?php
/**
 * Created by PhpStorm.
 * User: axotion
 * Date: 16.12.2017
 * Time: 19:19
 */

namespace App\Validator\Rules;

use ReflectionClass;

class AbstractRule
{
    public function getNameOfClass(): string
    {
        return (new ReflectionClass($this))->getShortName();
    }
}