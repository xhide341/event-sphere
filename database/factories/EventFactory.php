<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;
use App\Models\Event;
use App\Models\Venue;
use App\Models\Speaker;
class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Senior Highschool Graduation', 'Semester Orientation', 'Coding Workshop', 'Career Conference']),
            'description' => $this->faker->randomElement(
                ['"The annual cultural festival brings together students from various departments, filling the campus courtyard with vibrant booths showcasing art, music, and traditional cuisine."',
                "The auditorium buzzes with excitement as students gather for the highly anticipated guest lecture, with rows of chairs neatly arranged in front of the large projection screen.",
                "The charity marathon kicks off early in the morning, with participants warming up along the campus pathways, marked by colorful banners and hydration stations.",
                "The outdoor concert on the central lawn features local bands, with students lounging on blankets under string lights, enjoying the cool evening breeze.",
                "The science fair displays innovative student projects, with each booth equipped with detailed posters and interactive demos, attracting curious visitors throughout the day."
            ]),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'venue_id' => Venue::factory(),
            'department_id' => Department::factory(),
            'speaker_id' => Speaker::factory(),
            'image' => 'https://unsplash.it/640/480?random=' . Str::random(10),
            'status' => $this->faker->randomElement(['Archived', 'Upcoming', 'Ongoing', 'Completed']),
        ];
    }
}
