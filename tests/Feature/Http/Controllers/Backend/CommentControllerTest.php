<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User,Post,MediaType,Comment};

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        $this->post = Post::factory()->create();
        
        $this->user = User::factory()->create();
        
        $this->comment = Comment::factory()->create([
            'media_data_id'=>null,
        ]);
    }
    
    public function test_store_comment()
    {
        // $this->withoutExceptionHandling();
        $response=$this->actingAs($this->user,'web')
                       ->post('comments',
                              [
                                  'content'=>$this->comment->content,
                                  'post_id'=>$this->post->id,
                              ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('comments',
                                 ['content'=>$this->comment->content]);
    }

    public function test_store_void_comment()
    {        
        $response=$this->actingAs($this->user,'web')
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
        $response=$this->actingAs($this->user,'web')
                       ->put("comments/{$this->comment->id}",
                              [
                                  'content'=>'new content',
                                  'post_id'=>$this->post->id
                              ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('comments',['content'=>'new content']);  
    }

    public function test_edit_comment_invalid()
    {
        $response=$this->actingAs($this->user,'web')
                       ->put("comments/{$this->comment->id}",
                              [
                                  'content'=>'',
                                  'post_id'=>$this->post->id
                              ]);

        $response->assertStatus(302);

        $this->assertDatabaseMissing('comments',['content'=>'']);
        $response->assertSessionHasErrors('content');
    }

    public function test_comment_delete()
    {
        $response=$this->actingAs($this->user,'web')
                       ->delete("comments/{$this->comment->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('comments',['id'=>$this->comment->id]);
    }

    public function test_comment_invalid_delete()
    {   
        $response=$this->actingAs($this->user,'web') 
                       ->delete("comments/123123");

        $response->assertStatus(404);
    }
}
