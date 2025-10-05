<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * * This is the main seeder file that orchestrates running other seeders.
     */
    public function run(): void
    {
        // Call the UserSeeder to add the specific user account.
        $this->call([
            UserSeeder::class,
        ]);

        // You can uncomment these lines to create additional random users for testing.
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
