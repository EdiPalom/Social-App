<?php

namespace Tests\Feature\Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User,Post};

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_index_posts()
    {
        // $this->withoutExceptionHandling();
        User::factory(10)->create();
        $user = User::factory()->create();
        Post::factory(5)->create();

        $response = $this->actingAs($user,'sanctum')->json('GET','/api/posts');
        $response
            ->assertJsonStructure([
            'data'=>[
                '*'=>['id','post_name','content','iframe']
            ]])
            ->assertStatus(200);

    }
    
    public function test_show_posts(){
        // $this->withoutExceptionHandling();

        // $user = User::factory()
        //       ->has(Post::factory()->count(3))
        //       ->create();
        
        $user = User::factory()->create();

        $post = Post::factory()
              ->for($user)
            ->create();
        
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

        $this->assertInstanceOf(User::class,$post->user);
        // dd($post->user->username);

        // print_r($post->id_user);

        // $this->assertEquals($post->user->username,$user->username);
        
        $response = $this->actingAs($user,'sanctum')
                         ->json('GET',"/api/posts/$post->id");


        // $response->assertStatus(200)
        //          ->assertJson(['post_name'=>$post->title]);

                
        $response->assertJsonStructure([
            'id',
            'post_name',
            'content',
            'iframe',
            'author'=>['username','picture']
            // 'images'=>[
            //     '*'=>['url','description']
            // ]
        ])
                 ->assertJson(['post_name'=>$post->title])
                 ->assertStatus(200);   
    }

    public function test_show_invalid_posts()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user,'sanctum')->json('GET',"/api/posts/1231231234");
        
        $response
            ->assertStatus(404);   
    }
}
