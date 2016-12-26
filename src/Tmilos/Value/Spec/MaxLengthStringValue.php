<?php

namespace Tmilos\Value\Spec;

class MaxLengthStringValue extends NonEmptyTrimmedStringValue
{
    public static function isValid($value)
    {
        if (!parent::isValid($value)) {
            return false;
        }

        return strlen($value) <= static::getMaxLength();
    }

    /**
     * @return int
     */
    protected static function getMaxLength()
    {
        return 100;
    }
}
