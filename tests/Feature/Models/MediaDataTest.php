<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{MediaData, MediaType, User,Post};

class MediaDataTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        MediaType::factory(3)->create();

        $this->post = Post::factory()->create();
        
        $this->data = MediaData::factory()
                    ->for($this->post)
                    ->create();        
    }
    
    public function test_mediadata_creation()
    {
        // $this->withoutExceptionHandling();

        $this->assertDatabaseHas('media_data',[
            'url'=>$this->data->url
        ]);
    }

    public function test_mediadata_delete()
    {
        $this->data->delete();
        
        $this->assertDatabaseMissing('media_data',[
            'url'=>$this->data->url
        ]);
    }
}
