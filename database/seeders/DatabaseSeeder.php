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

        $contest = Contest::factory()->create([
            'creator_id' => 1,
            'title' => 'Test Contest',
            'description' => 'This is a test contest',
            'begin_date' => fake()->dateTimeBetween('now +5 minutes', 'now +10 minutes'),
        ]);

        User::factory(10)->create();
        Contest::factory(5)->create();

        $question = Question::factory()->create(['contest_id'=>$contest->id, 'correct_answer' => 1]);
        Option::factory()->create(['question_id' => $question->id, 'value' => 1]);
        Contest::all()-> where('id','!=',1) ->each(function ($contest) {
            $questions = Question::factory(rand(5, 10))->create(['contest_id' => $contest->id]);
            $questions->each(function ($question) {
            Option::factory(4)->create(['question_id' => $question->id]);
            });
        });
    }
}
