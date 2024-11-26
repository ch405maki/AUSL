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
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id'); // Match the UUID type from the users table
            $table->string('action'); // Store actions like 'login' or 'logout'
            $table->ipAddress('ip_address')->nullable(); // Optional, to log IP addresses
            $table->text('user_agent')->nullable(); // Optional, to log browser/OS info
            $table->timestamps(); // Auto-set creation timestamp

            // Foreign key linking to the users table
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_logs');
    }
};
