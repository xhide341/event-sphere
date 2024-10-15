<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Venue;

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
            'name' => $this->faker->randomElement(['San Agustin Bldg', 'MR Street', 'Atis Hall', 'Online Event']),
            'location' => $this->faker->randomElement(['San Agustin Building', 'Activity Center']),
            'capacity' => $this->faker->randomElement([100, 200, 300, 400, 500]),
        ];
    }
}
