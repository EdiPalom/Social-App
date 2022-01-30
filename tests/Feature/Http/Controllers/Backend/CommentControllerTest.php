<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User,Post,MediaType,Multimedia,Comment};

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_store_comment()
    {
        User::factory(10)->create();
        Post::factory(90)->create();
        MediaType::factory(3)->create();
        Multimedia::factory(90)->create();
        
        $user = User::factory()->create();

        $response=$this->actingAs($user,'web')
                       ->post('comments',
                              [
                                  'content'=>'new comment'
                              ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('comments',['content'=>'new comment']);
    }

    public function test_store_void_comment()
    {
        User::factory(10)->create();
        Post::factory(90)->create();
        MediaType::factory(3)->create();
        Multimedia::factory(90)->create();
        
        $user = User::factory()->create();

        $response=$this->actingAs($user,'web')
                       ->post('comments',
                              [
                                  'content'=>''
                              ]);

        // $response->assertStatus(422)
        //          ->assertSessionHasErrors('content');

        $response->assertSessionHasErrors('content');
    }

    public function test_edit_comment()
    {
                User::factory(10)->create();
        Post::factory(90)->create();
        MediaType::factory(3)->create();
        Multimedia::factory(90)->create();
        
        $user = User::factory()->create();

        $comment = Comment::factory()->create();

        $response=$this->actingAs($user,'web')
                       ->put("comments/$comment->id",
                              [
                                  'content'=>'new content'
                              ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('comments',['content'=>'new content']);  
    }

    public function test_edit_comment_invalid()
    {
        User::factory(10)->create();
        Post::factory(90)->create();
        MediaType::factory(3)->create();
        Multimedia::factory(90)->create();
        
        $user = User::factory()->create();

        $comment = Comment::factory()->create();

        $response=$this->actingAs($user,'web')
                       ->put("comments/$comment->id",
                              [
                                  'content'=>''
                              ]);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('comments',['content'=>'']);
        $response->assertSessionHasErrors('content');
    }

    public function test_comment_delete()
    {
        User::factory(10)->create();
        Post::factory(90)->create();
        MediaType::factory(3)->create();
        Multimedia::factory(90)->create();
        
        $user = User::factory()->create();

        $comment = Comment::factory()->create();

        $response=$this->actingAs($user,'web')
                       ->delete("comments/$comment->id");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('comments',['id'=>$comment->id]);
    }

    public function test_comment_invalid_delete()
    {   
        $user = User::factory()->create();

        $response=$this->actingAs($user,'web')
                       ->delete("comments/123123");

        $response->assertStatus(404);
    }
}
