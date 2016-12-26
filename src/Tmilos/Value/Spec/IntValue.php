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

class IntValue extends AbstractValue
{
    public static function isValid($value)
    {
        return is_int($value);
    }
}
