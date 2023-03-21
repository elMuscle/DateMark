<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datum' => fake()->dateTimeBetween('-1 day', '+2 week'),
            'was' => fake()->company(),
            'ort' => fake()->streetAddress(),
            'beginn' => fake()->time('H:i'),
            'ende' => fake()->time('H:i'),
            'need' => fake()->numberBetween(2,5)
        ];
    }
}
