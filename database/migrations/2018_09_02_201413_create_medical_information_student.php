<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalInformationStudent extends Migration
{
    public function up()
    {
        Schema::create('academic_year_medical_information_student', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('academic_year_id');
            $table->integer('medical_information_id');
            $table->integer('student_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('academic_year_medical_information_student');
    }
}
