<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'content'=>$this->faker->text(50),
            'status'=>rand(0,1),
            'id_user'=>rand(1,10),
            'id_multimedia'=>rand(1,90)
        ];
    }
}
