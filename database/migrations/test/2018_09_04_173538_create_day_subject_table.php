<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaySubjectTable extends Migration
{
    public function up()
    {
        Schema::create('day_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day_id');
            $table->integer('subject_id');
            $table->integer('professor_id');
            $table->time('start');
            $table->time('end');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('day_subject');
    }
}
