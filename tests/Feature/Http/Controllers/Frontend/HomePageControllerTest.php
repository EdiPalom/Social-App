<?php

namespace Tests\Feature\Http\Controllers\Frontend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User, Post, MediaData,MediaType};

class HomePageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        MediaType::factory(3)->create();
        
        $this->user = User::factory()->create();

        $this->post = Post::factory()
                    ->for($this->user)
                    ->has(MediaData::factory()->count(3),'images')
                    ->create();
    }
    
    public function test_home_index()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs($this->user,'web')->get('/');

        $response->assertStatus(200)
                 ->assertSee($this->post->title)
                 ->assertDontSee('Empty Posts');
    }
}
