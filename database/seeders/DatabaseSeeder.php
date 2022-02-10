<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\{Post,User,MediaType,MediaData,Like};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Post::factory(90)->create();

        MediaType::factory(3)->create();
        MediaData::factory(20)->create();

        Like::factory(200)->create();
    }
}
