<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{Like, MediaType, Multimedia, User,Post};

class LikeTest extends TestCase
{
    use RefreshDatabase;
    public function test_like_creation()
    {
        // $this->withoutExceptionHandling();
        MediaType::factory(3)->create();
        User::factory(10)->create();
        Post::factory(90)->create();
        Multimedia::factory(90)->create();

        $like = Like::factory()->create();

        $this->assertDatabaseHas('likes',[
            'id'=>$like->id
        ]);
    }

    public function test_like_delete()
    {
        MediaType::factory(3)->create();
        User::factory(10)->create();
        Post::factory(90)->create();
        Multimedia::factory(90)->create();

        $like = Like::factory()->create();
        
        $like->delete();
        
        $this->assertDatabaseMissing('likes',[
            'id'=>$like->id
        ]);
    }
}
