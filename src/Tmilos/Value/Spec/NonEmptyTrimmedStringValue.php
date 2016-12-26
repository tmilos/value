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
