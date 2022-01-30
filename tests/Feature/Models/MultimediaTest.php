<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{MediaType, Multimedia, User,Post};

class MultimediaTest extends TestCase
{
    use RefreshDatabase;
    public function test_multimedia_creation()
    {
        // $this->withoutExceptionHandling();
        MediaType::factory(3)->create();
        User::factory(10)->create();
        Post::factory(90)->create();

        
        $multimedia = Multimedia::factory()->create();

        $this->assertDatabaseHas('multimedia',[
            'id'=>$multimedia->id
        ]);
    }

    public function test_multimedia_delete()
    {
        MediaType::factory(3)->create();
        User::factory(10)->create();
        Post::factory(90)->create();
        $multimedia = Multimedia::factory()->create();

        $multimedia->delete();

        $this->assertDatabaseMissing('multimedia',[
            'id'=>$multimedia->id
        ]);
    }
}
