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

        Event::factory(8)
            ->sequence(
                [
                    'start' => now()->setTime(9, 0),
                    'end' => now()->setTime(10, 0),
                ],
                [
                    'start' => now()->setTime(11, 0),
                    'end' => now()->setTime(12, 0),
                ],
                [
                    'start' => now()->setTime(14, 0),
                    'end' => now()->setTime(16, 0),
                ],
                [
                    'start' => now()->setTime(11, 30),
                    'end' => now()->setTime(12, 30),
                ],
                [
                    'start' => now()->setTime(15, 10),
                    'end' => now()->setTime(16, 20),
                ],
                [
                    'start' => now()->setTime(8, 0),
                    'end' => now()->setTime(12, 0),
                ],
                [
                    'start' => now()->setTime(15, 0),
                    'end' => now()->setTime(19, 0),
                ],
                [
                    'start' => now()->setTime(20, 40),
                    'end' => now()->setTime(22, 10),
                ],
            )
            ->create();
    }
}
