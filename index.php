<?php

namespace App;

use App\Validator\Rules\ContainRule;
use App\Validator\Rules\MaxChar;
use App\Validator\Rules\MinimumChar;
use App\Validator\Rules\RequiredRule;
use App\Validator\Validator;

require "vendor/autoload.php";

$validator = new Validator();

$string = 'word';
$empty_string = null;

$validator->validate(new MinimumChar($string, 5), 'string')
    ->validate(new MaxChar($string, 2), 'string')
    ->validate(new ContainRule($string, 'w0r3'), 'string')
    ->validate(new RequiredRule($empty_string, 'empty_string'), 'empty_string');

if ($validator->fails()) {
    var_dump($validator->messages());
}

