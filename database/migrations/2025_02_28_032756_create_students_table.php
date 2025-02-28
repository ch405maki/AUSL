<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_number')->unique();
            $table->string('year_level');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->text('document');
            $table->string('printing_by')->nullable();
            $table->string('encoded_by')->nullable();
            $table->boolean('pending_item')->default(false);
            $table->decimal('gwa', 5, 2)->nullable();
            $table->string('status')->default('pending');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};