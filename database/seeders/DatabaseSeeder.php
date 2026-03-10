<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::firstOrCreate(
            ['email' => 'admin@pandakidquiz.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('Pandaquiz123#'),
                'is_admin' => true,
            ]
        );

        // Create Test User
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('test123'),
                'is_admin' => false,
            ]
        );

        // Run Category Seeder
        $this->call(CategorySeeder::class);

        // Run Game Seeder
        $this->call(GameSeeder::class);
    }
}
