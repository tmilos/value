<?php

namespace Tmilos\Value\Tests\Spec;

use Tmilos\Value\Spec\Gender;

class GenderTest extends \PHPUnit_Framework_TestCase
{
    public function test_all_method_returns_array_of_instances()
    {
        $all = Gender::all();
        $this->assertInternalType('array', $all);
        $this->assertCount(2, $all);
        $this->assertArrayHasKey(Gender::MALE, $all);
        $this->assertArrayHasKey(Gender::FEMALE, $all);
    }

    public function test_instantiates_with_constant_name_method()
    {
        /** @var Gender $m */
        $m = Gender::MALE();
        $this->assertInstanceOf(Gender::class, $m);
        $this->assertEquals(Gender::MALE, $m->getValue());
        $this->assertEquals('gender.male', $m->getTitle());
    }

    public function test_values_method_return_array_of_values()
    {
        $values = Gender::values();
        $this->assertInternalType('array', $values);
        $this->assertEquals([Gender::MALE, Gender::FEMALE], $values);
    }

    public function test_titles()
    {
        $this->assertEquals('gender.male', Gender::MALE()->getTitle());
        $this->assertEquals('gender.female', Gender::FEMALE()->getTitle());
    }

    public function test_equals()
    {
        $this->assertTrue(Gender::MALE()->equals(Gender::MALE()));
        $this->assertTrue(Gender::FEMALE()->equals(Gender::FEMALE()));
    }

    public function test_not_equals()
    {
        $this->assertTrue(Gender::MALE()->notEquals(Gender::FEMALE()));
        $this->assertTrue(Gender::MALE()->notEquals(Gender::FEMALE()));
    }

    public function test_casts_to_string_with_title()
    {
        $v = Gender::MALE();
        $s = (string)$v;
        $this->assertSame($v->getTitle(), $s);
    }
}
