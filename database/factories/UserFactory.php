<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'=>$this->faker->unique()->name(),
            'name' => $this->faker->name(),
            'lastname'=>$this->faker->lastName(),
            'phone_number'=> $this->faker->unique()->phoneNumber(),
            'birth_date'=>$this->get_rand_birth_date(date("Y-m-d")),⎈
            'status'=>rand(0,1),
            'connected'=>rand(0,1),
            'profile'=>$this->get_random_avatar(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    private function get_rand_birth_date(string $date):string
    {
        $arr = explode("-",$date);
        $year = (int)$arr[0];
        $year -= rand(18,60);
        $arr[0] = strval($year);
        return $arr[0]."-".$arr[1]."-".$arr[2];
    }

    private function get_random_avatar():string
    {
        $email = md5($this->faker->safeEmail());
        return "https://s.gravatar.com/avatar/$email";
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
