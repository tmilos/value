<?php

namespace Tmilos\Value\Tests;

use Tmilos\Value\AbstractValue;
use Tmilos\Value\Value;

class AbstractValueTest extends \PHPUnit_Framework_TestCase
{
    public function test_implements_value()
    {
        $reflection = new \ReflectionClass(AbstractValue::class);
        $this->assertTrue($reflection->implementsInterface(Value::class));
    }

}
