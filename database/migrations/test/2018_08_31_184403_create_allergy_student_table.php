<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergyStudentTable extends Migration
{
    public function up()
    {
        Schema::create('allergy_medical_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('allergy_id');
            $table->integer('medical_information_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('allergy_medical_information');
    }
}
