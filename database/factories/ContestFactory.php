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
            'title' => fake()->title(),
            'description' => fake()->text(),
            'mode' => 'individual',
            'begin_date' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'end_date' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'creator_id' => User::factory()->create()->id,
        ];
    }
}
