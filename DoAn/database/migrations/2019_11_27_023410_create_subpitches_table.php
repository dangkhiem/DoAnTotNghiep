<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubpitchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subpitches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pitch_id');
            $table->integer('shop_id');
            $table->integer('type');
            $table->time('start_time');
            $table->time('end_time');
            $table->bigInteger('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subpitches');
    }
}
