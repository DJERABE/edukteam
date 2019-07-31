<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassStudentTable extends Migration
{
    public function up()
    {
        Schema::create('class_student', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classe_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->integer('school_id')->unsigned();
            $table->integer('academic_year_id')->unsigned();
            $table->integer('studylevel_id')->unsigned();
            $table->string('previous_school');
            $table->string('academic_file',1000)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_student');
    }
}
