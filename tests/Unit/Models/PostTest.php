<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;

use App\Models\{Post,User};

class PostTest extends TestCase
{

    public function test_user_relation()
    {
        $user = new User;
        $user->username = "testing";
        $user->id = 1;
        $post = new Post;
        $post->id_user = $user->id;

        dd($post->user->username);
    }
    
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

    public function test_set_post_title_trimmed_and_stripped()
    {
        $post = new Post;
        $post->title = ' <p>Proyecto en php</p> ';
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

    public function test_set_post_body()
    {
        $post = new Post;
        $post->body="new content";
        $this->assertEquals($post->body,"new content");
    }

    public function test_set_post_body_stripped()
    {
        $post = new Post;
        $post->body="<p>new content</p>";
        $this->assertEquals($post->body,"new content");
    }

    function test_set_post_body_trimmed()
    {
        $post = new Post;
        $post->body=" new content ";
        $this->assertEquals($post->body,"new content");
    }

    function test_set_post_body_stripped_and_trimmed()
    {
        $post = new Post;
        $post->body=" <p>new content</p> ";
        $this->assertEquals($post->body,"new content");
    }

    public function test_set_post_iframe()
    {
        $post = new Post;
        $post->iframe='<iframe width="560" height="315" src="https://www.youtube.com/embed/zOjov-2OZ0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

        $this->assertEquals($post->iframe,'<iframe width="560" height="315" src="https://www.youtube.com/embed/zOjov-2OZ0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    }

    public function test_set_post_iframe_trimmed()
    {
        $post = new Post;
        $post->iframe='  <iframe width="560" height="315" src="https://www.youtube.com/embed/zOjov-2OZ0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  ';

        $this->assertEquals($post->iframe,'<iframe width="560" height="315" src="https://www.youtube.com/embed/zOjov-2OZ0E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    }   
}
