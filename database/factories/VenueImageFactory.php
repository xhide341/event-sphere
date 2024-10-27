<?php

namespace Database\Factories;

use App\Models\VenueImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class VenueImageFactory extends Factory
{
    protected $model = VenueImage::class;

    public function definition(): array
    {
        return [
            'path' => 'venues/default/noimage.webp',
            'is_primary' => false,
            'sort_order' => $this->faker->numberBetween(0, 10)
        ];
    }

    public function primary()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_primary' => true,
                'sort_order' => 0
            ];
        });
    }
}