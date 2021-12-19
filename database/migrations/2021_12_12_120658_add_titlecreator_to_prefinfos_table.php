<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitlecreatorToPrefinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prefinfos', function (Blueprint $table) {
            $table->string('title', 30);
            $table->string('creator', 30);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prefinfos', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('creator');
        });
    }
}
