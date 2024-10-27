<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venue;
class VenueSeeder extends Seeder
{
    public function run(): void
    {
        \Log::info('Before seeding - Venue count: ' . Venue::count());
        // 1. Define your exact venues and their images
        $venues = [
            [
                'name' => 'San Agustin Bldg',
                'location' => 'San Agustin Building',
                'capacity' => 200,
                'description' => 'The San Agustin Building...',
                'images' => [
                    // Primary image
                    [
                        'path' => 'venues/1/okarun.jpg',
                        'is_primary' => true,
                        'sort_order' => 0
                    ],
                    // Additional image
                    [
                        'path' => 'venues/1/okarun2.jpg',
                        'is_primary' => false,
                        'sort_order' => 1
                    ]
                ]
            ],
            // You can add more predefined venues here
            [
                'name' => 'MR Street',
                'location' => 'Activity Center',
                'capacity' => 300,
                'description' => 'The Activity Center...',
                'images' => [
                    [
                        'path' => 'venues/2/ayase.jpg',
                        'is_primary' => true,
                        'sort_order' => 0
                    ],
                    [
                        'path' => 'venues/2/ayase2.jpg',
                        'is_primary' => false,
                        'sort_order' => 1
                    ]
                ]
            ],
            [
                'name' => 'Atis Hall',
                'location' => 'Atis Hall',
                'capacity' => 400,
                'description' => 'The Atis Hall...',
                'images' => [
                    [
                        'path' => 'venues/3/seiko.jpg',
                        'is_primary' => true,
                        'sort_order' => 0
                    ],
                    [
                        'path' => 'venues/3/seiko2.jpg',
                        'is_primary' => false,
                        'sort_order' => 1
                    ]
                ]
            ]
            // Add more venues...
        ];

        // 2. Create each predefined venue with its images
        foreach ($venues as $venueData) {
            $images = $venueData['images'];
            unset($venueData['images']);
            
            $venue = Venue::create($venueData);
            \Log::info('Created predefined venue: ' . $venue->name);
            
            foreach ($images as $imageData) {
                $venue->images()->create($imageData);
            }
        }

        // 3. Add additional random venues using the factory
        \Log::info('Creating 5 random venues');
        Venue::factory()->count(5)->create();
        \Log::info('After seeding - Venue count: ' . Venue::count());
    }
}