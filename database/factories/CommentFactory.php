<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\{User,Post,MediaData};

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'media_data_id'=>MediaData::factory(),
            'post_id'=>Post::factory(),
            'content'=>$this->faker->text(50),
        ];
    }
}
