# VarsValidator
Validate variables in PHP

## Requirements

```
>=PHP7.1
```

## Install
```
composer require evilnet/validator
```
## Example of usage

```php
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

$validator->validate(new MinimumChar($string, 5))
    ->validate(new MaxChar($string, 2))
    ->validate(new ContainRule($string, 'w0r3'))
    ->validate(new RequiredRule($empty_string, 'empty_string'));

if ($validator->fails()) {
    var_dump($validator->messages());
}
```

Output will be like

```
array(1) { ["errors"]=> array(4) { ["MinimumChar"]=> string(38) "Passed variable must be greater than 5" ["MaxChar"]=> string(38) "Passed variable must be smaller than 2" ["ContainRule"]=> string(28) "Word w0r3 has been not found" ["RequiredRule"]=> string(32) "Variable empty_string is not set" } }
```

## New rule

If you want to create your own rule just implement App\Validator\Rules\Contracts\IRule interface and pass your vars via constructor
