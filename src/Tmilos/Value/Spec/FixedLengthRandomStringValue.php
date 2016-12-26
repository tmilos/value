<?php

namespace Tmilos\Value\Spec;

use Tmilos\Value\AbstractValue;

class FixedLengthRandomStringValue extends AbstractValue
{
    /**
     * @return int
     */
    protected static function getRequiredLength()
    {
        return 36;
    }

    /**
     * @return static
     */
    public static function generate()
    {
        return new static(bin2hex(random_bytes(static::getRequiredLength()/2)));
    }

    public static function isValid($value)
    {
        return is_string($value) && strlen($value) == static::getRequiredLength() && trim($value) === $value;
    }
}
