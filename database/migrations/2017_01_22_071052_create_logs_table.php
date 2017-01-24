<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('station_name'); // pos
            $table->string('latitude'); // lat
            $table->string('longitude'); // lng
            $table->integer('hardware_id'); // hwid
            $table->string('hardware_type'); // dev
            $table->string('interval'); // int
            $table->dateTime('time_start'); // w1
            $table->dateTime('time_end');  // w2
            $table->float('measurement_start'); // d1
            $table->float('measurement_end'); // d2
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
        Schema::dropIfExists('logs');
    }
}
