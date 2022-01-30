<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;

use App\Helpers\Phone;

class PhoneTest extends TestCase
{
    public function test_phone_number()
    {
        $result = Phone::validate("1234567");
        $this->assertTrue($result);

        $result = Phone::validate("123456");
        $this->assertFalse($result);

        $result = Phone::validate("aoeu");
        $this->assertFalse($result);

        $result = Phone::validate("aoeu/");
        $this->assertFalse($result);

        $result = Phone::validate("aoeaoeuoeaoeu");
        $this->assertFalse($result);

        $result = Phone::validate("123aoeu");
        $this->assertFalse($result);
    }
}
