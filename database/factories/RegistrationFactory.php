<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Registration;
use App\Models\User;
use Carbon\Carbon;

class RegistrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registration::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        // Generate a random date within the last 30 days
        $date = Carbon::now()->subDays(rand(0, 30))->setTime(
            rand(8, 17), // Random hour between 8 AM and 5 PM
            rand(0, 59), // Random minute
            rand(0, 59)  // Random second
        );

        return [
            'event_id' => Event::factory(),
            'user_id' => User::factory(),
            'registration_date' => $date,
            'created_at' => $date,    // Set created_at to match registration_date
            'updated_at' => $date,    // Set updated_at to match registration_date
        ];
    }
}
