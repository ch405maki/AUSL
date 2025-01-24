<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnotherLinkToOfficePostTable extends Migration
{
    public function up()
    {
        Schema::table('office_post', function (Blueprint $table) {
            $table->string('link')->nullable();
        });
    }

    public function down()
    {
        Schema::table('office_post', function (Blueprint $table) {
            $table->dropColumn('link');
        });
    }
}
