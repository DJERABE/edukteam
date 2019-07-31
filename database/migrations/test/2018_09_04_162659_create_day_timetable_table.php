<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayTimetableTable extends Migration
{
    public function up()
    {
        Schema::create('day_timetable', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day_id');
            $table->integer('timetable_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('day_timetable');
    }
}
