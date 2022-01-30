<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;

use App\Helpers\Email;

class EmailTest extends TestCase
{
    public function test_email()
    {
        $result = Email::validate('i@admin.com');

        $this->assertTrue($result);

        $result = Email::validate('aoeuaoeu');
        $this->assertFalse($result);

        $result = Email::validate(' i@admin.com    ');
        $this->assertTrue($result);

        $result = Email::validate(' i@@@admin.com    ');
        $this->assertFalse($result);

        $result = Email::validate('<?php echo "hello"');
        $this->assertFalse($result);
    }
}
