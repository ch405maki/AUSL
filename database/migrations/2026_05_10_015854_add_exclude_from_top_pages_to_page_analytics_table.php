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
            $table->boolean('exclude_from_top_pages')->default(false)->after('is_bot');
            $table->index('exclude_from_top_pages');
        });
    }

    public function down(): void
    {
        Schema::table('page_analytics', function (Blueprint $table) {
            $table->dropIndex(['exclude_from_top_pages']);
            $table->dropColumn('exclude_from_top_pages');
        });
    }
};
