<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('asdfasdf'),
        ]);

        // Create additional users
        User::factory(10)->create();

        // Seed events (which will also create venues, departments, and speakers)
        $this->call(EventSeeder::class);

        // Seed registrations
        $this->call(RegistrationSeeder::class);
    }
}
