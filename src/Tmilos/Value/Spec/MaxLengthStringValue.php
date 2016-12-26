<?php

/*
 * This file is part of the tmilos/value package.
 *
 * (c) Milos Tomic <tmilos@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

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
