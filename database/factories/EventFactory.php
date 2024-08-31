<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Venue;

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
            'name' => $this->faker->sentence(3, true),
            'description' => $this->faker->paragraph(2),
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'venue_id' => Venue::factory(),
            'status' => $this->faker->randomElement(['Scheduled', 'Cancelled', 'Postponed']),
            'image' => $this->faker->imageUrl(640, 480, 'event', true),
        ];
    }
}
