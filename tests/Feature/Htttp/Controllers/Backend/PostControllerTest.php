<?php

namespace Tests\Feature\Htttp\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{Post, User};

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    // public function test_void_posts()
    // {
    //     $response = $this->get('posts');

    //     $response->assertStatus(200)
    //              ->assertSee('Empty Posts');
    // }

    // public function test_post_index()
    // {
    //     User::factory(10)->create();

    //     $post = Post::factory()->create();

    //     $response = $this->get('posts');

    //     $response->assertStatus(200)
    //              ->assertSee($post->name)
    //              ->assertDontSee('Empty Posts');
    // }


    public function test_store_post()
    {
        $user = User::factory()->create();

        $response=$this->actingAs($user,'web')->post('posts',[
            'title'=>"PHP",
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('posts',['title'=>'php']);
    }

    public function test_update_post()
    {
        User::factory(10)->create();
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user,'web')->put("posts/$post->id",[
            'title'=>'new title'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('posts',['title'=>'new title']);
    }

    public function test_update_invalid_post()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user,'web')->put("posts/234123",[
            'title'=>'new title'
        ]);

        $response->assertStatus(404);
                 // ->assertSessionHasErrors('name');

        // $data = session()->all();
        // dd($data);
    }

    public function test_destroy_post()
    {
        User::factory(10)->create();
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user,'web')->delete("posts/$post->id");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('posts',['title'=>'new title']);
    }

    public function test_destroy_invalid_post()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user,'web')->delete("posts/234123");


        $response->assertStatus(404);
    }

    // public function test_show_post()
    // {
    //     User::factory(10)->create();
    //     $user = User::factory()->create();
    //     $post = Post::factory()->create();
    //     $this->assertDatabaseHas('posts',['title'=>$post->title]);

    //     // $response =$this->actingAs($user,'web')->json('GET','posts/$post->id');
        
    //     $response=$this->actingAs($user,'web')->get('posts/'.$post->id);

    //     $response->assertStatus(200);
    // }


    
    
}
