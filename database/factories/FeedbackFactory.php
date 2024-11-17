<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween(3, 5),
            'comment' => fake()->randomElement([
                'Great event! Really enjoyed the presentation and learned a lot.',
                'The speaker was very knowledgeable and engaging.',
                'Well organized event with valuable content.',
                'Excellent networking opportunity and insightful discussions.',
                'Very informative session, would recommend to others.',
                'The interactive portions were particularly helpful.',
                'Good balance of theory and practical examples.',
                'The venue was perfect for this type of event.',
                'Looking forward to attending more events like this.',
                'The Q&A session was particularly enlightening.',
            ]),
        ];
    }
}
