<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MultimediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status'=>rand(0,1),
            'post_id'=>rand(1,90),
            'user_id'=>rand(1,10),
            'media_types_id'=>rand(1,3)
        ];
    }
}
