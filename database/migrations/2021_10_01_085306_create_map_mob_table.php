<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapMobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_mob', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_map');
            $table->unsignedBigInteger('id_mob');

            $table->foreign('id_map')->references('id')->on('map');
            $table->foreign('id_mob')->references('id')->on('mob');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map_mob');
    }
}
