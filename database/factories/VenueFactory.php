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

    protected static $venueIndex = 0;

    protected static $venueImages = [
        'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=800', // Conference hall
        'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=800', // Modern auditorium
        'https://images.unsplash.com/photo-1517164850305-99a3e65bb47e?w=800', // Concert venue
        'https://images.unsplash.com/photo-1526041092449-209d556f7a32?w=800', // Theater
        'https://images.unsplash.com/photo-1517457210348-703079e57d4b?w=800', // Workshop space
    ];

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $venueNames = [
            'Predefined Venue 1',
            'Predefined Venue 2',
            'Predefined Venue 3',
            'Predefined Venue 4',
            'Predefined Venue 5'
        ];
        
        $locations = [
            'Predefined Location 1',
            'Predefined Location 2',
            'Predefined Location 3',
            'Predefined Location 4',
            'Predefined Location 5'
        ];
        
        $descriptions = [
            "The Predefined Venue 1 is a historic structure that houses the university's administration offices and classrooms.",
            "The Predefined Venue 2 is a modern facility that hosts various events and activities throughout the year.",
            "The Predefined Venue 3 is a versatile venue that can be used for a variety of events, including conferences, workshops, and concerts.",
            "The Predefined Venue 4 is a state-of-the-art auditorium perfect for performances and large gatherings.",
            "The Predefined Venue 5 is an innovative space designed for collaborative meetings and interactive workshops.",
        ];

        // Reset index if we've used all venues
        if (static::$venueIndex >= count($venueNames)) {
            static::$venueIndex = 0;
        }

        $index = static::$venueIndex++;

        return [
            'name' => $venueNames[$index],
            'location' => $locations[$index],
            'capacity' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'description' => $descriptions[$index],
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Venue $venue) {
            // Get the corresponding image path based on venue index
            $imagePath = static::$venueImages[static::$venueIndex - 1] ?? "venues/default/noimage.webp";

            // Create primary image
            VenueImage::factory()
                ->primary()
                ->create([
                    'venue_id' => $venue->id,
                    'path' => $imagePath,
                ]);

            // Create additional images (still using default noimage)
            VenueImage::factory()
                ->count(5)
                ->create([
                    'venue_id' => $venue->id,
                    'path' => "venues/default/noimage.webp",
                ]);
        });
    }
}
