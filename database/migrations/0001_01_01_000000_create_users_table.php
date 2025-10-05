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
        // Create the 'users' table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key for user ID
            $table->string('name'); // User's name
            $table->string('email')->unique(); // User's email (must be unique)
            $table->string('password'); // User's hashed password
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'users' table if the migration is rolled back
        Schema::dropIfExists('users');
    }
};
