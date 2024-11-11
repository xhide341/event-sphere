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

    protected $venueData = [
        [
            'name' => 'Carthage Activity Center',
            'location' => 'LCUP Main Campus',
            'capacity' => 100,
            'description' => "The Carthage Activity Center is a historic building that serves as the hub for various university activities and events.",
            'images' => [
                'images/venues/1/activity-center-1.jpg',
                'images/venues/1/activity-center-2.jpg',
                'images/venues/1/activity-center-3.jpg',
                'images/venues/1/activity-center-4.jpg',
            ]
        ],
        [
            'name' => 'BARCIE Atis Hall',
            'location' => 'LCUP Main Campus',
            'capacity' => 500,
            'description' => "The BARCIE Atis Hall is a modern building that serves as the main venue for university events and ceremonies.",
            'images' => [
                'images/venues/2/atis-hall-1.jpg',
                'images/venues/2/atis-hall-2.jpg',
                'images/venues/2/atis-hall-3.jpg',
                'images/venues/2/atis-hall-4.jpg',
            ]
        ],
        [
            'name' => 'BARCIE Rambutan Hall',
            'location' => 'LCUP Main Campus',
            'capacity' => 100,
            'description' => "The BARCIE Rambutan Hall is a historic building that serves as the hub for various university activities and events.",
            'images' => [
                'images/venues/3/rambutan-hall-1.jpg',
                'images/venues/3/rambutan-hall-2.jpg',
                'images/venues/3/rambutan-hall-3.jpg',
                'images/venues/3/rambutan-hall-4.jpg',
            ]
        ]

    ];

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        // Get a random venue data set
        $venueData = array_shift($this->venueData);
        
        return [
            'name' => $venueData['name'],
            'location' => $venueData['location'],
            'capacity' => $venueData['capacity'],
            'description' => $venueData['description'],
        ];    
    }

    public function configure()
    {
        return $this->afterCreating(function (Venue $venue) {
            // Find the venue data that matches this venue's name
            $venueData = collect($this->venueData)
                ->firstWhere('name', $venue->name);
            
            // Create primary image
            VenueImage::factory()
                ->primary()
                ->create([
                    'venue_id' => $venue->id,
                    'path' => $venueData['images'][0] ?? "default/noimage.jpg",
                ]);

            // Create additional images
            foreach (array_slice($venueData['images'], 1) as $index => $path) {
                VenueImage::factory()
                    ->create([
                        'venue_id' => $venue->id,
                        'path' => $path,
                        'sort_order' => $index + 1
                    ]);
            }
        });
    }
}
