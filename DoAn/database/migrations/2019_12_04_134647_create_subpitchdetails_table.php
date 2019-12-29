<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubpitchdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subpitchdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pitch_id');
            $table->integer('type');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('cost');
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
        Schema::dropIfExists('subpitchdetails');
    }
}
