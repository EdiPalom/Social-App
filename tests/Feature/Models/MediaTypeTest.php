<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\MediaType;

class MediaTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    public function test_type_creation()
    {
        $this->withoutExceptionHandling();
        $type = MediaType::factory()->create();

        $this->assertDatabaseHas('media_types',[
            'name'=>$type->name
        ]);
    }

    public function test_type_delete()
    {
        $type = MediaType::factory()->create();

        $type->delete();

        $this->assertDatabaseMissing('media_types',[
            'name'=>$type->name
        ]);
    }
}
