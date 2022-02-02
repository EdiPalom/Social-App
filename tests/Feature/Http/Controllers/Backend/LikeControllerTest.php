<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User,Post,MediaType,Like};

class LikeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
                    
        $this->user = User::factory()->create();
        $this->post = Post::factory()->create();
        $this->like = Like::factory()
                    ->for($this->post)
                    ->create(
            [
                'media_data_id'=>null,
            ]
        );
    }
    
    public function test_like_store()
    {
        // $this->withoutExceptionHandling();
            
        $response = $this->actingAs($this->user,'web')->post('likes',[
            'post_id'=>$this->post->id,
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('likes',['user_id'=>$this->user->id]);
    }

    public function test_like_store_invalid()
    {
        $response = $this->actingAs($this->user,'web')->post('likes',[
            'post_id'=>''
        ]);

        // $response->assertStatus(301);
        $response->assertSessionHasErrors('post_id');
        
        $this->assertDatabaseMissing('likes',['user_id'=>$this->user->id]);
    }

    public function test_like_delete()
    {
        $response = $this->actingAs($this->user,'web')->delete("likes/{$this->like->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('likes',['id'=>$this->like->id]);
    }

    public function test_like_invalid_delete()
    {          
        $response = $this->actingAs($this->user,'web')->delete("likes/123123");

        $response->assertStatus(404);

    }
}
