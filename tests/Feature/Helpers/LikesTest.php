<?php

namespace Tests\Feature\Helpers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{Post,User,Like,MediaType};
use App\Helpers\Likes;

class LikesTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp():void
    {
        parent::setUp();

        MediaType::factory(3)->create();
        $this->user = User::factory()->create();

        $this->post = Post::factory()
                    ->for($this->user)
                    ->create();
        
        $this->like = Like::factory()
                    ->for($this->post)
                    ->create();
    }
    
    public function test_likes_count()
    {
       $likes =  Likes::get_post_count($this->post);
       $this->assertEquals($likes,1);
    }
}
