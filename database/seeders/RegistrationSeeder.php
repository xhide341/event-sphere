<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Registration;
use Carbon\Carbon;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = User::all();
        $events = Event::all();

        foreach ($users as $user) {
            // Randomly assign each user to 1-3 events
            $eventsToRegister = $events->random(rand(3, 5));
            
            foreach ($eventsToRegister as $event) {
                Registration::create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                    'registration_date' => Carbon::now(),
                ]);
            }
        }
    }
}
