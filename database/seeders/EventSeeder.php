<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Venue;
use App\Models\Department;
use App\Models\Speaker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing venues instead of creating new ones
        $venues = Venue::all();

        // Create departments
        $departments = Department::factory()->count(5)->create();

        // Create speakers
        $speakers = Speaker::factory()->count(10)->create();

        // Create events
        Event::factory()->count(20)->make()->each(function ($event) use ($venues, $departments, $speakers) {
            $event->venue_id = $venues->random()->id;
            $event->department_id = $departments->random()->id;
            $event->speaker_id = $speakers->random()->id;
            $event->save();
        });
    }
}
