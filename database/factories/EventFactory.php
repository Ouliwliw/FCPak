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
            // 'title' => $this->faker->text(20),
            // 'content' => $this->faker->text(60),
            // 'colour' => $this->faker->colorName,
            // 'starts_at' => now(),
            // 'ends_at' => now()->addHour(),

        ];
    }
}
