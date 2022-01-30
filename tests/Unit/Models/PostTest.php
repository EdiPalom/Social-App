<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;

use App\Models\Post;

class PostTest extends TestCase
{
    public function test_set_post_title_in_lowercase()
    {
        $post = new Post;
        $post->title = 'Proyecto en php';
        $this->assertEquals('proyecto en php',$post->title);
    }

    public function test_set_post_title_trimmed()
    {
        $post = new Post;
        $post->title = ' Proyecto en php ';
        $this->assertEquals('proyecto en php',$post->title);
    }

    public function test_set_post_title_stripped()
    {
        $post = new Post;
        $post->title = '<p>Proyecto en php</p>';
        $this->assertEquals('proyecto en php',$post->title);
    }

    public function test_get_post_title()
    {
        $post = new Post;
        $post->title = 'proyecto en PHP';
        $this->assertEquals('Proyecto en php',$post->get_title);
    }

    public function test_post_nullable()
    {
        $post = new Post;
        $post->title="php";
        $this->assertNull($post->body);
    }
}
