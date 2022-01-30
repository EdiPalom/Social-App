<?php

namespace Tests\Unit\Helpers;

use PHPUnit\Framework\TestCase;

class SanitizationTest extends TestCase
{
    public function test_sanitize_string(){
        $result = sanitize_string(" aoeueu ");

        $this->assertEquals($result, 'aoeueu');

        // $result = sanitize_string("<?php echo aoeueu ");
        // $result = strip_tags("<p>helllo</p>");
        $result = sanitize_string("<?php echo hello ?>hello");
        
        $this->assertEquals($result, 'hello');
    }

    public function test_sanitize_url(){
        
        $result = sanitize_url("https://duckduckgo.com/?q=Laravel&atb=v217-1&ia=web");

        $this->assertEquals($result,"https://duckduckgo.com/?q=Laravel&atb=v217-1&ia=web");

        $result = sanitize_url("  https://duckduckgo.com/?q=Laravel&atb=v217-1&ia=web  ");
        $this->assertEquals($result,"https://duckduckgo.com/?q=Laravel&atb=v217-1&ia=web");
        
    }

    public function test_sanitize_iframe()
    {
        $result = sanitize_iframe('<iframe width="560" height="315" src="https://www.youtube.com/embed/zOjov-2OZ0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');

        $this->assertEquals($result,'<iframe width="560" height="315" src="https://www.youtube.com/embed/zOjov-2OZ0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    }

    public function test_sanitize_iframe_trimmed()
    {
        $result=sanitize_iframe('  <iframe width="560" height="315" src="https://www.youtube.com/embed/zOjov-2OZ0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  ');

        $this->assertEquals($result,'<iframe width="560" height="315" src="https://www.youtube.com/embed/zOjov-2OZ0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    }

}
