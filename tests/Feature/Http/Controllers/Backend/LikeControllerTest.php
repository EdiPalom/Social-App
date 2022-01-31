<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User,Post,Multimedia,MediaType,Like};

class LikeControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_like_store()
    {
        User::factory(10)->create();
        Post::factory(90)->create();
        MediaType::factory(3)->create();
        Multimedia::factory(90)->create();
                
        $user = User::factory()->create();
        $multimedia = Multimedia::factory()->create();
        
        $response = $this->actingAs($user,'web')->post('likes',[
            'id_multimedia'=>$multimedia->id
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('likes',['id_user'=>$user->id]);
    }

    public function test_like_store_invalid()
    {
        User::factory(10)->create();
        Post::factory(90)->create();
        MediaType::factory(3)->create();
        Multimedia::factory(90)->create();
                
        $user = User::factory()->create();
        $multimedia = Multimedia::factory()->create();
        
        $response = $this->actingAs($user,'web')->post('likes',[
            'id_multimedia'=>''
        ]);

        // $response->assertStatus(301);
        $response->assertSessionHasErrors('id_multimedia');
        
        $this->assertDatabaseMissing('likes',['id_user'=>$user->id]);
    }

    public function test_like_delete()
    {
        User::factory(10)->create();
        Post::factory(90)->create();
        MediaType::factory(3)->create();
        Multimedia::factory(90)->create();
                
        $user = User::factory()->create();
        $multimedia = Multimedia::factory()->create();
        $like = Like::factory()->create();
        
        $response = $this->actingAs($user,'web')->delete("likes/$like->id");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('likes',['id'=>$like->id]);
    }

    public function test_like_invalid_delete()
    {
        User::factory(10)->create();
        Post::factory(90)->create();
        MediaType::factory(3)->create();
        Multimedia::factory(90)->create();
                
        $user = User::factory()->create();
        $multimedia = Multimedia::factory()->create();
          
        $response = $this->actingAs($user,'web')->delete("likes/123123");

        $response->assertStatus(404);

    }
}
