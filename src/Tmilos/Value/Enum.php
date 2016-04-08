<?php

/*
 * This file is part of the tmilos-value package.
 *
 * (c) Milos Tomic <tmilos@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tmilos\Value;

interface Enum extends Value
{
    /**
     * @return Enum[]
     */
    public static function all();

    /**
     * @return array
     */
    public static function values();
}
