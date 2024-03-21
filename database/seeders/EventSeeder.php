<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Event::factory(3)
            ->sequence(
                [
                    'starts_at' => now()->setTime(9, 0),
                    'ends_at' => now()->setTime(10, 0),
                ],
                [
                    'starts_at' => now()->setTime(11, 0),
                    'ends_at' => now()->setTime(12, 0),
                ],
                [
                    'starts_at' => now()->setTime(14, 0),
                    'ends_at' => now()->setTime(16, 0),
                ]
            )
            ->create();
    }
}
