<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_user_creation()
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users',[
            'email'=>$user->email
        ]);
    }

    public function test_user_delete()
    {
        $user = User::factory()->create();

        $user->delete();

        $this->assertDatabaseMissing('users',[
            'email'=>$user->email
        ]);
    }
}
