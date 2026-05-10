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
        Schema::table('page_analytics', function (Blueprint $table) {
            $table->index(['is_bot', 'visited_at'], 'page_analytics_is_bot_visited_at_index');
        });
    }

    public function down(): void
    {
        Schema::table('page_analytics', function (Blueprint $table) {
            $table->dropIndex('page_analytics_is_bot_visited_at_index');
        });
    }
};
