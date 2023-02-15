<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tpoll>
 */
class TpollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titel' => fake()->word().' '.fake()->year(),
            'info' => fake()->sentence(),
            'beschreibung' => fake()->paragraph(5),
            'status' => fake()->numberBetween(0,2)
        ];
    }
}
