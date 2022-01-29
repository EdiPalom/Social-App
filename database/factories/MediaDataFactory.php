<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'id_multimedia'=>rand(1,90),
            'url'=>$this->faker->imageUrl(1280,720),
            'description'=>$this->faker->text(100)
        ];
    }
}
