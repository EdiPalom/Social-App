<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;

use App\Helpers\Url;

class UrlTest extends TestCase
{
    public function test_validate_url(){
        
        $result = Url::validate("https://duckduckgo.com/?q=Laravel&atb=v217-1&ia=web");

        $this->assertTrue($result);
                          
        $result = Url::validate("  https://duckduckgo.com/?q=Laravel&atb=v217-1&ia=web  ");
        
        $this->assertTrue($result);

        $result = Url::validate("aoeu");

        $this->assertFalse($result);
    } 
}
