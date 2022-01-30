<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;

use App\Helpers\Password;

class PasswordTest extends TestCase
{
    public function test_password()
    {
        $result = Password::validate("passWord123!");
        $this->assertTrue($result);

        $result = Password::validate("pass!");
        $this->assertFalse($result);

        $result = Password::validate("pass");
        $this->assertFalse($result);

        $result = Password::validate("pass123");
        $this->assertFalse($result);

        $result = Password::validate("pass@");
        $this->assertFalse($result);
    }
}
