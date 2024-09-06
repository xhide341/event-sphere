<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Department;

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
            'capacity' => $this->faker->numberBetween(10, 100),
            'venue' => $this->faker->randomElement([
                $this->faker->sentence(3),
                'Online Event'
            ]),
            'category' => $this->faker->randomElement(['Workshop', 'Seminar', 'Conference', 'Festival', 'Party', 'Concert', 'Sports', 'Other']),
            'status' => $this->faker->randomElement(['Scheduled', 'Cancelled', 'Postponed']),
            'image' => 'https://unsplash.it/640/480?random=' . Str::random(10),
            'department_id' => Department::factory()->create()->id,
        ];
    }
}
