<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildhoodDiseaseStudentTable extends Migration
{
    public function up()
    {
        Schema::create('childhood_disease_medical_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('childhood_disease_id');
            $table->integer('medical_information_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('childhood_disease_medical_information');
    }
}
