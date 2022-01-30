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
                '*'=>['id','title','body','iframe','created_at','updated_at']
            ]])
            ->assertStatus(200);
    }
    
    public function test_show_post(){
        
    }
}
