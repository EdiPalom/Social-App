<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_email()
    {
        $result = validate_email('i@admin.com');

        $this->assertTrue($result);

        $result = validate_email('aoeuaoeu');
        $this->assertFalse($result);
    }

    public function test_name()
    {
        $result = validate_name("aoeu");
        $this->assertTrue($result);

        $result = validate_name("test123");
        $this->assertFalse($result);

        $result = validate_name("test/123");
        $this->assertFalse($result);

        $result = validate_name("i@mail.com");
        $this->assertFalse($result);
    }

    public function test_phone()
    {
        $result = validate_phone("1234567");
        $this->assertTrue($result);

        $result = validate_phone("123456");
        $this->assertFalse($result);

        $result = validate_phone("aoeu");
        $this->assertFalse($result);

        $result = validate_phone("aoeu/");
        $this->assertFalse($result);

        $result = validate_phone("aoeaoeuoeaoeu");
        $this->assertFalse($result);

        $result = validate_phone("123aoeu");
        $this->assertFalse($result);        
    }

    public function test_password()
    {
        $result = validate_password("passWord123!");
        $this->assertTrue($result);

        $result = validate_password("pass!");
        $this->assertFalse($result);

        $result = validate_password("pass");
        $this->assertFalse($result);

        $result = validate_password("pass123");
        $this->assertFalse($result);

        $result = validate_password("pass@");
        $this->assertFalse($result);
    }

    public function test_validate_url(){
        $result = validate_url("https://duckduckgo.com/?q=Laravel&atb=v217-1&ia=web");

        $this->assertTrue($result);
                          
        $result = validate_url("  https://duckduckgo.com/?q=Laravel&atb=v217-1&ia=web  ");
        
        $this->assertTrue($result);

        $result = validate_url("aoeu");

        $this->assertFalse($result);
    } 
}
