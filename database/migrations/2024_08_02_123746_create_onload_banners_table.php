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
        Schema::create('onload_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->string('icon');
            $table->string('confirmButtonText');
            $table->string('cancelButtonText');
            $table->string('url');
            $table->boolean('state');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onload_banners');
    }
};
