<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Post;

class MediaDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id'=>Post::factory(),
            'media_type_id'=>rand(1,3),
            'url'=>$this->faker->imageUrl(1280,720),
            'description'=>$this->faker->text(100)
        ];
    }
}
