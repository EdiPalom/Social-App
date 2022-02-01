<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User,Post,Comment};

class CommentControllerTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    
    public function setUp() :void
    {
        parent::setUp();
        // Multimedia::factory(90)->create();        
        $this->user = User::factory()->create();
        $this->post = Post::factory()->for($this->user)->create();
        $this->comment = Comment::factory()
                       ->for($this->user)
                       ->for($this->post)
                       ->create([
                           'multimedia_id'=>null
                       ]);

        $this->comment_collection = Comment::factory(3)
                                  ->for($this->user)
                                  ->for($this->post)
                                  ->create([
                                      'multimedia_id'=>null
                                  ]);
    }

    public function test_comment_post_index(){
        // $this->withoutExceptionHandling();
        
        $response = $this->actingAs($this->user,'sanctum')
                         ->json('GET',"/api/comments/post/{$this->post->id}");

        $response->assertJsonStructure([
            'data'=>[
                '*'=>[
                    'id',
                    'content',
                    'author'=>[
                        'username',
                        'picture'
                    ],                
                ]
            ]
        ])
                 ->assertStatus(200);        
    }

        public function test_comment_post_index_invalid(){
        // $this->withoutExceptionHandling();
        
        $response = $this->actingAs($this->user,'sanctum')
                         ->json('GET',"/api/comments/post/345234");

        $response->assertStatus(404);        
    }
    
    public function test_comment_show(){
        
        // $this->withoutExceptionHandling();
        $response = $this->actingAs($this->user,'sanctum')
                         ->json('GET',"/api/comments/{$this->comment->id}");

        $response->assertJsonStructure([
            'id',
            'content',
            'author'=>[
                'username',
                'picture'
            ],
        ])
                 ->assertJson([
                     'content'=>$this->comment->content,
                     'author'=>[
                         'username'=>$this->user->username,
                     ]
                 ])
                 ->assertStatus(200);
    }

    public function test_comment_invalid_show(){
        $response = $this->actingAs($this->user,'sanctum')
                         ->json('GET',"/api/comments/123154234");

        $response->assertStatus(404);
    }
}
