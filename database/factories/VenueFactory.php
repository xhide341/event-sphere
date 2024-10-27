<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Venue;
use App\Models\VenueImage;

class VenueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Venue::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Predefined Venue 1', 'Predefined Venue 2', 'Predefined Venue 3']),
            'location' => $this->faker->randomElement(['Predefined Location 1', 'Predefined Location 2', 'Predefined Location 3']),
            'capacity' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'description' => $this->faker->randomElement([
                "The Predefined Venue 1 is a historic structure that houses the university's administration offices and classrooms.",
                "The Predefined Venue 2 is a modern facility that hosts various events and activities throughout the year.",
                "The Predefined Venue 3 is a versatile venue that can be used for a variety of events, including conferences, workshops, and concerts.",
                "The Predefined Venue 4 is a virtual venue that allows for events to be held online, with participants joining from anywhere in the world.",
            ]),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Venue $venue) {
            // Create primary image
            VenueImage::factory()
                ->primary()
                ->create([
                    'venue_id' => $venue->id,
                    'path' => "venues/default/noimage.webp",
                ]);

            // Create additional images
            VenueImage::factory()
                ->count(2) // Create 2 additional images
                ->create([
                    'venue_id' => $venue->id,
                    'path' => "venues/default/noimage.webp",
                ]);
        });
    }
}
