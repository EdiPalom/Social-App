<?php

namespace Tests\Feature\Http\Controllers\Frontend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User, Post};

class HomePageControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_home_index()
    {
        User::factory(10)->create();
        
        $user = User::factory()->create();

        $post = Post::factory()->create();

        $response = $this->actingAs($user,'web')->get('/');

        $response->assertStatus(200)
                 ->assertSee($post->title)
                 ->assertDontSee('Empty Posts');
    }
}
