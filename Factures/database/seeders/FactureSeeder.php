<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facture; // Import the Facture model
use Illuminate\Support\Facades\DB; // Optional: If using DB facade
use Carbon\Carbon; // For easy date manipulation

class FactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Option 1: Using Eloquent Model Create (Recommended) ---
        // Clear the table first to avoid duplicates if run multiple times
        Facture::truncate(); // Or DB::table('FACTURE')->delete(); if truncate causes foreign key issues

        Facture::create([
            'ID_commande' => 1, // Example: Assumes a commande with ID 1 exists
            'Montant' => 150.75,
            'Date_facture' => Carbon::now()->subDays(10)->toDateString(), // e.g., 10 days ago
            'Statut' => 'Payée'
        ]);

        Facture::create([
            'ID_commande' => 2, // Example: Assumes a commande with ID 2 exists
            'Montant' => 85.00,
            'Date_facture' => Carbon::now()->subDays(5)->toDateString(), // e.g., 5 days ago
            'Statut' => 'En attente'
        ]);

        Facture::create([
            'ID_commande' => 1, // Example: Another facture for commande 1
            'Montant' => 25.50,
            'Date_facture' => Carbon::now()->subDays(2)->toDateString(), // e.g., 2 days ago
            'Statut' => 'Annulée'
        ]);

        // Add more create() calls as needed...

        // --- Option 2: Using DB Facade (Less common now, bypasses Eloquent features) ---
        /*
        DB::table('FACTURE')->insert([
            [
                'ID_commande' => 1,
                'Montant' => 150.75,
                'Date_facture' => Carbon::now()->subDays(10)->toDateString(),
                'Statut' => 'Payée',
                'created_at' => now(), // Manually set timestamps
                'updated_at' => now()
            ],
            [
                'ID_commande' => 2,
                'Montant' => 85.00,
                'Date_facture' => Carbon::now()->subDays(5)->toDateString(),
                'Statut' => 'En attente',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // ... more arrays
        ]);
        */

        // --- Option 3: Using a Factory (Best for lots of fake data) ---
        // This requires creating a FactureFactory first (`php artisan make:factory FactureFactory --model=Facture`)
        // Then defining fake data generation rules in database/factories/FactureFactory.php
        // Then you could run:
        // Facture::factory()->count(50)->create(); // Creates 50 random factures
    }
}