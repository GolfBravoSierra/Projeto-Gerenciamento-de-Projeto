<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_can_login_user(): void
    {
        $user = User::factory()->create();

        $auth = ['user_name'=>$user->user_name,'password'=>$user->password];
        
        $response = $this->post('/login', $auth);

        $response->assertRedirect('/');
    }
}
