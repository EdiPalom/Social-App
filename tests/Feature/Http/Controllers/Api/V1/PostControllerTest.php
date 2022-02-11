<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User,Post};

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->post = Post::factory()
              ->for($this->user)
            ->create();
    }
    
    public function test_index_posts()
    {
        // $this->withoutExceptionHandling();
        User::factory(10)->create();
        Post::factory(5)->create();

        $response = $this->actingAs($this->user,'sanctum')->json('GET','/api/posts');

        $response
            ->assertJsonStructure([
            'data'=>[
                '*'=>['id','post_name','content','iframe',
                      'images'=>['*'=>['id','url','description','created_at','media_type_id','post_id','status','updated_at']],
                      'likes',
                      'author'=>['username','picture']],
            ]])
            ->assertStatus(200);
    }
    
    public function test_show_posts(){
        // $this->withoutExceptionHandling();

        // $user = User::factory()
        //       ->has(Post::factory()->count(3))
        //       ->create();
        

        
        // $post = Post::factory()
        //       ->for(User::factory()->state([
        //           'name'=>"Edisson Palomares",
        //       ]))
        //     ->create();
        
        // $post = Post::factory()->create();
        
        // $post = Post::create([
        //     'id_user'=>$user->id,
        //     'title'=>'testing'
        // ]);
        
        // $post = Post::factory()->create([
        //     "id_user"=>$user->id
        // ]);

        

        // $this->assertEquals($post->id_user,$user->id);
        // dd($post->id_user);

        $this->assertInstanceOf(User::class,$this->post->user);
        $response = $this->actingAs($this->user,'sanctum')
                         ->json('GET',"/api/posts/{$this->post->id}");


        $response->assertJsonStructure([
            'id',
            'post_name',
            'content',
            'iframe',
            'author'=>['username','picture'],
        ])
                 ->assertJson(['post_name'=>$this->post->title])
                 ->assertStatus(200);   
    }

    public function test_show_invalid_posts()
    {
        $response = $this->actingAs($this->user,'sanctum')->json('GET',"/api/posts/1231231234");
        
        $response
            ->assertStatus(404);   
    }
}
