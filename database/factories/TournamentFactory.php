<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->city() . ' tournament',
            'city' => fake()->city(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'class' => 'U-' . fake()-> numberBetween(8, 18),
        ];
    }
}
