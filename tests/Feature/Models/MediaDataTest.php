<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{MediaData, MediaType, Multimedia, User,Post};

class MediaDataTest extends TestCase
{
    use RefreshDatabase;
    public function test_mediadata_creation()
    {
        // $this->withoutExceptionHandling();
        MediaType::factory(3)->create();
        User::factory(10)->create();
        Post::factory(90)->create();
        Multimedia::factory(90)->create();


        $data = MediaData::factory()->create();
        

        $this->assertDatabaseHas('media_data',[
            'url'=>$data->url
        ]);
    }

    public function test_mediadata_delete()
    {
        MediaType::factory(3)->create();
        User::factory(10)->create();
        Post::factory(90)->create();
        Multimedia::factory(90)->create();

        $data = MediaData::factory()->create();

        $data->delete();
        
        $this->assertDatabaseMissing('media_data',[
            'url'=>$data->url
        ]);
    }
}
