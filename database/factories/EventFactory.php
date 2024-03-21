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
            'user_id' => $this->faker->numberBetween(0, 100),
            'start' => now(),
            'end' => now()->addHour(),
            'title' => $this->faker->text(15),
            'description' => $this->faker->text(60),
            'is_all_day' => $this->faker->boolean(50),
        ];
    }
}
