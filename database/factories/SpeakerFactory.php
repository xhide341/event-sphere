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
                $name = $this->faker->name;
                $title = $this->faker->title;
                
                // Check if the name already starts with an abbreviated title
                if (!preg_match('/^(Mr\.|Mrs\.|Ms\.|Dr\.|Prof\.)/', $name)) {
                    $name = $title . ' ' . $name;
                }
                
                return $name;
            },
            'email' => $this->faker->unique()->safeEmail,
            'bio' => $this->faker->paragraph,
            'profile_picture' => $this->faker->imageUrl(200, 200, 'people'),
        ];
    }
}
