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

use Tmilos\Value\AbstractEnum;

class Gender extends AbstractEnum
{
    const MALE = 'male';
    const FEMALE = 'female';

    private static $titles = [
        self::MALE => 'gender.male',
        self::FEMALE => 'gender.female',
    ];

    public function getTitle()
    {
        return self::$titles[$this->getValue()];
    }
}
