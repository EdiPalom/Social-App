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
            'id_post'=>rand(1,90),
            'id_user'=>rand(1,10),
            'id_type'=>rand(1,3)
        ];
    }
}
