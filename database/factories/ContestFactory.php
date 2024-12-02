<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contest>
 */
class ContestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucfirst(fake()->word()),
            'description' => fake()->text(),
            'mode' => rand(1,4),
            'award' => fake()->text(),
            'begin_date' => fake()->dateTimeBetween('now', '+1 week'),
            'end_date' => fake()->dateTimeBetween('now +1 week', '+2 week'),
            'creator_id' => User::factory()->create()->id,
        ];
    }
}
