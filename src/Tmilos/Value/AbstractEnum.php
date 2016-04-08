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

abstract class AbstractEnum extends AbstractValue implements Enum
{
    /** @var array */
    private static $constantsCache = [];

    /** @var array */
    private static $reflectionClassCache = [];

    /**
     * Returns array of all Enum instances index by their values.
     *
     * @return Enum[] Constant name => Enum
     */
    public static function all()
    {
        $result = [];
        foreach (self::getConstants() as $k => $v) {
            /** @var Value $object */
            $object = new static($v);
            $result[$object->getValue()] = $object;
        }

        return $result;
    }

    /**
     * Returns array of constant values.
     *
     * @return array
     */
    public static function values()
    {
        return array_values(self::getConstants());
    }

    /**
     * Check if is valid enum value.
     * 
     * @param $value
     *
     * @return bool
     */
    public static function isValid($value)
    {
        return in_array($value, self::getConstants(), true);
    }

    /**
     * Returns a value when called statically like so: MyEnum::SOME_VALUE() given SOME_VALUE is a class constant.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return static
     *
     * @throws \BadMethodCallException
     */
    public static function __callStatic($name, array $arguments = [])
    {
        $array = self::getConstants();
        if (array_key_exists($name, $array)) {
            $reflectionClass = self::getReflectionClass();
            array_unshift($arguments, $array[$name]);

            return $reflectionClass->newInstanceArgs($arguments);
        }

        throw new \BadMethodCallException(sprintf('No static method or enum constant "%s" in class "%s"', $name, get_called_class()));
    }

    /**
     * @return \ReflectionClass
     */
    private static function getReflectionClass()
    {
        $class = get_called_class();
        if (!array_key_exists($class, self::$reflectionClassCache)) {
            self::inspect($class);
        }

        return self::$reflectionClassCache[$class];
    }

    private static function getConstants()
    {
        $class = get_called_class();
        if (!array_key_exists($class, self::$constantsCache)) {
            self::inspect($class);
        }

        return self::$constantsCache[$class];
    }

    private static function inspect($class)
    {
        if (!array_key_exists($class, self::$reflectionClassCache)) {
            $reflection = new \ReflectionClass($class);
            self::$reflectionClassCache[$class] = $reflection;
            self::$constantsCache[$class] = $reflection->getConstants();
        }
    }
}
