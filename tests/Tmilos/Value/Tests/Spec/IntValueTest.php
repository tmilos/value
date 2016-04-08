<?php

namespace Tmilos\Value\Tests\Spec;

use Tmilos\Value\Spec\IntValue;

class IntValueTest extends \PHPUnit_Framework_TestCase
{
    public function test_constructs_with_integer()
    {
        $v = new IntValue($expected = 10);
        $this->assertSame($expected, $v->getValue());
    }

    /**
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage Value "10" is not valid value of class Tmilos\Value\Spec\IntValue
     */
    public function test_construct_error_with_non_integer()
    {
        new IntValue('10');
    }
}
