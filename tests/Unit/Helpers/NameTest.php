<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;

use App\Helpers\Name;

class NameTest extends TestCase
{
    public function test_name()
    {
        $result = Name::validate("aoeu");
        $this->assertTrue($result);

        $result = Name::validate("test123");
        $this->assertFalse($result);

        $result = Name::validate("test/123");
        $this->assertFalse($result);

        $result = Name::validate("i@mail.com");
        $this->assertFalse($result);
    }
}
