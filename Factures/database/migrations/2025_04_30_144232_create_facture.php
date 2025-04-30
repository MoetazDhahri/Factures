<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the FACTURE table
        Schema::create('FACTURE', function (Blueprint $table) {
            // o ID_facture (int) - Primary Key, Auto-Incrementing
            $table->increments('ID_facture');

            // o ID_commande (int) - Assuming this is a foreign key, using unsigned integer
            // Use unsignedBigInteger if referencing a bigIncrements primary key (like standard id())
            // Use unsignedInteger if referencing an increments primary key
            $table->unsignedInteger('ID_commande');

            // o Montant (float)
            $table->float('Montant');

            // o Date_facture (date)
            $table->date('Date_facture');

            // o Statut (varchar) - Laravel uses string for varchar
            $table->string('Statut'); // You can optionally specify a length, e.g., $table->string('Statut', 50);

            // Standard Laravel timestamp columns (created_at, updated_at)
            // Remove this line if you don't need them
            $table->timestamps();

            // Optional: Add foreign key constraint if ID_commande references another table
            // Example assumes a 'commandes' table with an 'ID_commande_pk' column using increments()
            // Adjust 'commandes' and 'ID_commande_pk' to your actual related table and primary key name
            // $table->foreign('ID_commande')->references('ID_commande_pk')->on('commandes')->onDelete('cascade'); // or restrict, set null, etc.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the table if the migration is rolled back
        Schema::dropIfExists('FACTURE');
    }
};