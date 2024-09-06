<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Department;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $startTime = $this->faker->time();
        $endTime = date('H:i:s', strtotime($startTime) + rand(3600, 7200)); // 1-2 hours later

        return [
            'name' => strtoupper($this->faker->lexify(str_repeat('?', rand(3, 4)))),
            'start_date' => $this->faker->date('l, F j, Y'),
            'start_time' => $startTime,
            'end_time' => $endTime,
        ];
    }
}
