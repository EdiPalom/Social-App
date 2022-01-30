<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

use Tests\TestCase;
use App\Models\User;

class ImageControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_upload_image()
    {
        // $this->withoutExceptionHandling();
        $user = User::factory()->create();
        
        Storage::fake('local');

        $response = $this->actingAs($user,'web')->post('multimedia/image',[
            'image' =>$image = UploadedFile::fake()->image('photo.png')
        ]);

        Storage::disk('local')->assertExists("images/{$image->hashName()}");

        $response->assertStatus(201);

        // $response->assertRedirect('profile');
    }

    public function test_upload_image_required()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user,'web')->post('multimedia/image',[
            'image' => ''
        ]);

        $response->assertSessionHasErrors('image');

        // $response->assertRedirect('profile');
    }
}
