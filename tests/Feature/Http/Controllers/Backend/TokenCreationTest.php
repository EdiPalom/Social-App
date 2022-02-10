<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User};

class TokenCreationTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp():void{
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_token_creation()
    {
        $response = $this->actingAs($this->user,'web')
                         ->post('tokens/create',[
                             'name'=>'android'
                         ]);

        $response->assertJsonStructure([
            'token',
            'message'
        ])->assertJson([
            'message'=>'success'
        ]);
    }

    public function test_token_without_user()
    {
        $response = $this->post('tokens/create',[
            'name'=>'android'
        ]);
        
        $response->assertJsonStructure([
            'message'
        ])->assertJson([
            'message'=>'Unauthorized'
        ])->assertStatus(401);
    }
}
