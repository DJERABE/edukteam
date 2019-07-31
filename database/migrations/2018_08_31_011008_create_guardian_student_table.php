<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardianStudentTable extends Migration
{
    public function up()
    {
        Schema::create('guardian_student', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guardian_id');
            $table->integer('student_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guardian_student');
    }
}
