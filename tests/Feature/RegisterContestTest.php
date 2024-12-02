<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Contest;
use Tests\TestCase;

class RegisterContestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_can_create_contest(): void
    {
        $contest = Contest::factory()->create();
        
        $this->assertDatabaseHas('contests', ['id' => $contest->id]);
    }
}

