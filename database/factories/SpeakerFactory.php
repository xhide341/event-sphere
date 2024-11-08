<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Speaker>
 */
class SpeakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => function () {
                // Get a name and limit to first and last name only
                $fullName = $this->faker->name;
                $nameParts = explode(' ', $fullName);
                $name = count($nameParts) > 2 
                    ? $nameParts[0] . ' ' . end($nameParts)
                    : $fullName;
                
                $title = $this->faker->title;
                
                // Check if the name already starts with an abbreviated title
                if (!preg_match('/^(Mr\.|Mrs\.|Ms\.|Dr\.|Prof\.)/', $name)) {
                    $name = $title . ' ' . $name;
                }
                
                return $name;
            },
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => '09' . $this->faker->numerify('#########'), // Generates 9 random digits after '09'
            'bio' => $this->faker->paragraph,
            'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=' . uniqid(),
            'availability_status' => $this->faker->randomElement(['Available', 'Tentative', 'Confirmed', 'Cancelled'])
        ];
    }
}
