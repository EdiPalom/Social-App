<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{Comment, MediaType, Multimedia, User,Post};

class CommentTest extends TestCase
{
    use RefreshDatabase;
    public function test_comment_creation()
    {
        // $this->withoutExceptionHandling();
        MediaType::factory(3)->create();
        User::factory(10)->create();
        Post::factory(90)->create();
        Multimedia::factory(90)->create();

        $comment = Comment::factory()->create();

        $this->assertDatabaseHas('comments',[
            'content'=>$comment->content
        ]);
    }

    public function test_comment_delete()
    {
        MediaType::factory(3)->create();
        User::factory(10)->create();
        Post::factory(90)->create();
        Multimedia::factory(90)->create();

        $comment = Comment::factory()->create();
        
        $comment->delete();
        
        $this->assertDatabaseMissing('comments',[
            'content'=>$comment->content
        ]);
    }
}
