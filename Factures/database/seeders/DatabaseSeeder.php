<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // You can keep or remove the User seeding logic
        User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
        ]);

        // Call your FactureSeeder
        $this->call([
            FactureSeeder::class,
            // Add other seeders here if you create more
            // e.g., CommandeSeeder::class,
        ]);
    }
}