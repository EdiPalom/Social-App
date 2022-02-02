<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{Like, MediaType, Multimedia, User,Post};

class LikeTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        $this->like = Like::factory()
                    ->create([
                        'media_data_id'=>null
                    ]);
    }
    
    public function test_like_creation()
    {
        // $this->withoutExceptionHandling();

        $this->assertDatabaseHas('likes',[
            'id'=>$this->like->id
        ]);
    }

    public function test_like_delete()
    {        
        $this->like->delete();
        
        $this->assertDatabaseMissing('likes',[
            'id'=>$this->like->id
        ]);
    }
}
