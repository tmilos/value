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

abstract class AbstractValue implements Value
{
    /** @var int|string */
    private $value;

    /**
     * ScalarValue constructor.
     *
     * @param int|string $value
     *
     * @throws \UnexpectedValueException
     */
    public function __construct($value)
    {
        if (false === static::isValid($value)) {
            throw new \UnexpectedValueException(sprintf('Value "%s" is not valid value of class %s', $value, get_called_class()));
        }
        $this->value = $value;
    }

    /**
     * @return int|string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return (string) $this->value;
    }

    /**
     * @param mixed $other
     *
     * @return bool
     */
    public function equals($other)
    {
        $value = $other instanceof Value ? $other->getValue() : $other;

        return $this->getValue() === $value;
    }

    /**
     * @param mixed $other
     *
     * @return bool
     */
    public function notEquals($other)
    {
        return false === $this->equals($other);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }
}
