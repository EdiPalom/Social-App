<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User,Post,Like};
use App\Helpers\Likes;

class LikeControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp():void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        
        $this->post = Post::factory()
              ->for($this->user)
            ->create();

        $this->like = Like::factory()
                    ->for($this->user)
                    ->for($this->post)
                    ->create([
                      'multimedia_id'=>null,
                    ]);
    }
    
    public function test_get_post_likes(){

        // $this->withoutExceptionHandling();
        
        $this->assertInstanceOf(User::class,$this->post->user);
        
        $response = $this->actingAs($this->user,'sanctum')
                         ->json('GET',"/api/likes/post/{$this->post->id}");

        $response->assertJsonStructure([
            'likes',
        ])
                 ->assertJson([
                     'likes'=>Likes::get_post_count($this->post),
                 ])
                 ->assertStatus(200);   
    }

    public function test_get_invalid_post_likes(){

        // $this->withoutExceptionHandling();
        
        $response = $this->actingAs($this->user,'sanctum')
                         ->json('GET',"/api/likes/post/1232345");

        $response->assertStatus(404);   
    }
}
