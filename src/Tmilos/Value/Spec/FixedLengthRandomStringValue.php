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
        return new static(bin2hex(random_bytes(static::getRequiredLength() / 2)));
    }

    public static function isValid($value)
    {
        return is_string($value) && strlen($value) == static::getRequiredLength() && trim($value) === $value;
    }
}
