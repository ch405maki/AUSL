<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_analytics', function (Blueprint $table) {
            $table->id();
            $table->string('route_name')->nullable()->index();
            $table->string('route_path')->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('visitor_id', 64)->nullable()->index();
            $table->string('session_id', 255)->nullable()->index();
            $table->boolean('is_bot')->default(false)->index();
            $table->timestamp('visited_at')->index();
            $table->timestamps();

            $table->index(['visitor_id', 'visited_at']);
            $table->index(['route_name', 'visited_at']);
            $table->index(['session_id', 'route_path', 'visited_at'], 'session_route_dedup');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_analytics');
    }
};
