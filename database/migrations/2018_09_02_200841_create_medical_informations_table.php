<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalInformationsTable extends Migration
{
    public function up()
    {
        Schema::create('medical_informations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bloodgroup_id');
            $table->string('emergency_clinic');

            $table->string('family_doctor');
            $table->string('family_doctor_tel');

            $table->string('others_diseases');
            $table->string('health_record');

            $table->string('hospital_pin');
            
            $table->integer('student_id');
            
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
        Schema::dropIfExists('medical_informations');
    }
}
