<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    public function run(): void
    {
        // Get all events and users
        $events = Event::all();
        $users = User::where('role', '!=', 'admin')->get();

        foreach ($events as $event) {
            // Randomly select 3-8 users to provide feedback for each event
            $randomUsers = $users->random(fake()->numberBetween(3, 8));

            foreach ($randomUsers as $user) {
                Feedback::factory()->create([
                    'event_id' => $event->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
