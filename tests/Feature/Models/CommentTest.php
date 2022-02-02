<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{Comment, MediaType, User,Post};

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->comment = Comment::factory()->create([
            'media_data_id'=>null
        ]);        
    }
    
    public function test_comment_creation()
    {
        $this->withoutExceptionHandling();

        $this->assertDatabaseHas('comments',[
            'content'=>$this->comment->content
        ]);
    }

    public function test_comment_delete()
    {        
        $this->comment->delete();
        
        $this->assertDatabaseMissing('comments',[
            'content'=>$this->comment->content
        ]);
    }
}
