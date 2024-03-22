<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $numberOfEvents = rand(5, 15); // Nombre aléatoire d'événements par utilisateur

            Event::factory($numberOfEvents)->create([
                'user_id' => $user->id,
                'background_color' => $user->color
            ]);
        }
    }
}
