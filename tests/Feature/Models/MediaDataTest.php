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

        $this->type = MediaType::factory()->create();

        $this->post = Post::factory()->create();
        
        $this->data = MediaData::factory()
                    ->for($this->post)
                    ->create();        
    }

    public function test_media_data_creation()
    {
        MediaData::create([
            'post_id' => $this->post->id,
            'url'=>'images/image.png',
            'media_type_id' => $this->type->id
        ]);

        $this->assertDatabaseHas('media_data',['url'=>'images/image.png']);
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
