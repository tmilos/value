<?php

namespace Tmilos\Value\Tests\Spec;

use Ramsey\Uuid\Uuid;
use Tmilos\Value\Spec\UuidValue;

class UuidValueTest extends \PHPUnit_Framework_TestCase
{
    public function test_constructs_with_uuid()
    {
        $uuid = Uuid::uuid1();
        $v = new UuidValue($uuid);
        $this->assertSame($uuid, $v->getValue());
    }
}
