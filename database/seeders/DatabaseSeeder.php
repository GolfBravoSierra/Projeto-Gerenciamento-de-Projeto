<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contest;
use App\Models\Question;
use App\Models\Option;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'user_name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'user_name' => 'Test User2',
            'email' => 'test2@example.com',
            'password' => bcrypt('password'),
        ]);

        Contest::factory()->create([
            'creator_id' => 1,
            'title' => 'Test Contest',
            'description' => 'This is a test contest',
        ]);

        User::factory(10)->create();
        $contests = Contest::factory(5)->create();

        $question = Question::factory()->create(['contest_id'=>$contests[0]->id]);
        Option::factory()->create(['question_id' => $question->id]);
    }
}
