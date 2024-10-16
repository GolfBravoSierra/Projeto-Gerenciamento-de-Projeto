<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_can_create_user(): void
    {
        $user = User::factory()->create(['password' => 'password']);
        #dd($user->toArray());
        $this->post('/register', $user->toArray());
        
        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }
}

