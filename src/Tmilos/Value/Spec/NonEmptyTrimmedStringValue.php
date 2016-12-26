<?php

namespace Tmilos\Value\Spec;

use Tmilos\Value\AbstractValue;

class NonEmptyTrimmedStringValue extends AbstractValue
{
    public function __construct($value)
    {
        parent::__construct(trim($value));
    }

    public static function isValid($value)
    {
        return strlen(trim($value)) > 0;
    }
}
