<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('countdown_events', function (Blueprint $table) {
            $table->dateTime('end_date')->nullable()->after('target_date');
        });
    }

    public function down(): void
    {
        Schema::table('countdown_events', function (Blueprint $table) {
            $table->dropColumn('end_date');
        });
    }
};