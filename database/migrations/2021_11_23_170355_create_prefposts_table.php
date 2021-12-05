<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrefpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('prefinfo_id');
            $table->string('content');
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('prefinfo_id')->references('id')->on('prefinfos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prefposts');
    }
}
