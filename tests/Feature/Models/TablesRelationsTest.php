<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\{User,Post,Like,Comment,MediaData,MediaType};

class TablesRelationsTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp():void
    {
        parent::setUp();

        MediaType::factory(3)->create();

        $this->post = Post::factory()
                            ->create();

        $this->like = Like::factory()
                    ->create();

        $this->comment = Comment::factory()->create();

        $this->type = MediaType::factory()->create();

        $this->media = MediaData::factory()
                     ->for($this->type)
                     ->create();
    }
    
    public function test_posts_relations()
    {
        $this->assertInstanceOf(User::class,$this->post->user);
    }

    public function test_likes_relations()
    {
        $this->assertInstanceOf(User::class,$this->like->user);
        $this->assertInstanceOf(Post::class,$this->like->post);
        $this->assertInstanceOf(MediaData::class,$this->like->mediaData);
    }

    public function test_comments_relations()
    {
        $this->assertInstanceOf(User::class,$this->comment->user);
        $this->assertInstanceOf(Post::class,$this->comment->post);
        $this->assertInstanceOf(MediaData::class,$this->comment->mediaData);
    }

    public function test_media_data_relations()
    {
        $this->assertInstanceOf(Post::class,$this->media->post);
        $this->assertInstanceOf(MediaType::class,$this->media->mediaType);
    }
}
