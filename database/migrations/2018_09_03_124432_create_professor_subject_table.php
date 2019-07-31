<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorSubjectTable extends Migration
{
    public function up()
    {
        Schema::create('professor_subject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professor_id');
            $table->integer('subject_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('professor_subject');
    }
}
