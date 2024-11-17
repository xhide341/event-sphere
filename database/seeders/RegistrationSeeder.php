<?php

namespace Database\Seeders;

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
        
        // Create more registrations in recent days, fewer in older days
        foreach ($users as $user) {
            // Randomly assign each user to 5-10 events
            $eventsToRegister = $events->random(rand(5, 10));
            
            foreach ($eventsToRegister as $event) {
                // Weight the random days to favor more recent dates
                $daysAgo = $this->getWeightedRandomDays();
                
                $registrationDate = Carbon::now()->subDays($daysAgo)->setTime(
                    rand(8, 17), // Random hour between 8 AM and 5 PM
                    rand(0, 59), // Random minute
                    rand(0, 59)  // Random second
                );

                Registration::create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                    'registration_date' => $registrationDate,
                    'created_at' => $registrationDate,
                    'updated_at' => $registrationDate,
                ]);
            }
        }
    }

    private function getWeightedRandomDays(): int
    {
        $weights = [
            [0, 6, 50],    // Last 7 days: 50% chance
            [7, 13, 25],   // 8-14 days ago: 25% chance
            [14, 20, 15],  // 15-21 days ago: 15% chance
            [21, 29, 10],  // 22-30 days ago: 10% chance
        ];

        $random = rand(1, 100);
        $currentTotal = 0;

        foreach ($weights as [$min, $max, $weight]) {
            $currentTotal += $weight;
            if ($random <= $currentTotal) {
                return rand($min, $max);
            }
        }

        return 0; // fallback to today
    }
}
