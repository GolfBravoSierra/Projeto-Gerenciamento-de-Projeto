<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Contest;

class RegisterInContestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the user is being associated with the championship table through the button.
     */
    public function test_user_can_register_in_contest(): void
    {
        // Create a user
        $user = User::factory()->create();

        // Create a championship
        $contest = Contest::factory()->create();

        // Simulate the user clicking the register button
        $response = $this->actingAs($user)->post('/contest/'.$contest->id, [
            'contest_id' => $contest->id,
        ]);


        // Assert the user is associated with the championship
        $this->assertDatabaseHas( 'user_contests', [
            'user_id' => $user->id,
            'contest_id' => $contest->id,
        ]);
    }
}
