<?php

namespace App\Assert;

use Assert\Assertion;

final class Assert extends Assertion
{
    protected static $exceptionClass = 'AU\Exception\AssertionFailedException';
}
