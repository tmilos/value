<?php

/*
 * This file is part of the tmilos/value package.
 *
 * (c) Milos Tomic <tmilos@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tmilos\Value;

interface Value
{
    /**
     * @param $value
     *
     * @return bool
     */
    public static function isValid($value);

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param mixed $other
     *
     * @return bool
     */
    public function equals($other);

    /**
     * @param mixed $other
     *
     * @return bool
     */
    public function notEquals($other);
}
