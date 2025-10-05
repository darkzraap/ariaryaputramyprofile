<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seeder creates a specific user account for testing or initial setup.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arya',
            'email' => 'ariaryaputra5@gmail.com',
            'email_verified_at' => now(), // Assuming you want the user to be verified
            'password' => Hash::make('141613522ari'), // Always hash passwords
        ]);
    }
}
