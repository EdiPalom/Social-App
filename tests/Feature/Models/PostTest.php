<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{Post, User};

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_post_creation()
    {
        User::factory(10)->create();
        $post = Post::factory()->create();

        $this->assertDatabaseHas('posts',[
            'title'=>$post->title
        ]);
    }

    public function test_post_delete()
    {
        User::factory(10)->create();
        $post = Post::factory()->create();

        $post->delete();

        $this->assertDatabaseMissing('posts',[
            'title'=>$post->title
        ]);
    }
}
