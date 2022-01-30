<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;

use App\Helpers\UserName;

class UserNameTest extends TestCase
{
    public function test_username()
    {
        $result = UserName::validate("test");
        $this->assertTrue($result);

        $result = UserName::validate("test123");
        $this->assertTrue($result);

        $result = UserName::validate("tes");
        $this->assertFalse($result);

        $result = UserName::validate("tesaoeuntsahouensthoneutshaonstehu");
        $this->assertFalse($result);

        $result = UserName::validate("test1231234512345234512354123412341");
        $this->assertFalse($result);

        $result = UserName::validate("test_123");
        $this->assertTrue($result);

        $result = UserName::validate("test@123");
        $this->assertFalse($result);

        $result = UserName::validate("test 123");
        $this->assertFalse($result);

        $result = UserName::validate("test.123");
        $this->assertFalse($result);

        $result = UserName::validate("test-123");
        $this->assertFalse($result);

        $result = UserName::validate("test/123");
        $this->assertFalse($result);

        $result = UserName::validate("test#123");
        $this->assertFalse($result);

        $result = UserName::validate("1234567");
        $this->assertFalse($result);

        $result = UserName::validate("123aoeu");
        $this->assertFalse($result);
    }
}
