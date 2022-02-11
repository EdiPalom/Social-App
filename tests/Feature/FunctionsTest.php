<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

use App\Models\{User,Post,Like,MediaType};

class FunctionsTest extends TestCase
{

    use RefreshDatabase;
    public function setUp():void
    {
        parent::setUp();

        MediaType::factory(3)->create();

        $this->user = User::factory()->create();
        $this->user_2 = User::factory()->create();

        $this->post = Post::factory()
                    ->for($this->user)
                    ->create();

        $this->like = Like::factory()
                    ->for($this->user)
                    ->for($this->post)
                    ->create();
    }

    public function test_check_user_like()
    {
        Auth::login($this->user);
        
        $response =  check_user_like($this->post->id);

        // $this->assertEquals(1,$response);
        $this->assertTrue($response);
    }

    public function test_like_with_other_user()
    {
        Auth::login($this->user_2);
        
        $response =  check_user_like($this->post->id);

        // $this->assertEquals(0,$response);
        $this->assertFalse($response);
    }
}
