<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venue;
class VenueSeeder extends Seeder
{
    public function run(): void
    {
        $venues = [
            [
                'name' => 'San Agustin Bldg',
                'location' => 'San Agustin Building',
                'capacity' => 200,
                'description' => 'The San Agustin Building is a historic structure that houses the university\'s administration offices and classrooms.',
                'images' => [
                    [
                        'path' => 'venues/san-agustin/primary.jpg',
                        'is_primary' => true,
                        'sort_order' => 0
                    ],
                    [
                        'path' => 'venues/san-agustin/image-2.jpg',
                        'is_primary' => false,
                        'sort_order' => 1
                    ],
                    [
                        'path' => 'venues/san-agustin/image-3.jpg',
                        'is_primary' => false,
                        'sort_order' => 2
                    ],
                    [
                        'path' => 'venues/san-agustin/image-4.jpg',
                        'is_primary' => false,
                        'sort_order' => 3
                    ]
                ]
            ],
            [
                'name' => 'Activity Center',
                'location' => 'MR Street',
                'capacity' => 300,
                'description' => 'The Activity Center is a modern facility that hosts various events and activities throughout the year.',
                'images' => [
                    [
                        'path' => 'venues/activity-center/primary.jpg',
                        'is_primary' => true,
                        'sort_order' => 0
                    ],
                    // ... other images
                ]
            ],
            // ... more venues
        ];

        foreach ($venues as $venueData) {
            // remove images from venue array
            $images = $venueData['images'];
            unset($venueData['images']);
            
            // create venue (without images)
            $venue = Venue::create($venueData);    
            
            // create venue images through venue model (images())
            foreach ($images as $imageData) {
                $venue->images()->create($imageData);
            }
        }
    }
}