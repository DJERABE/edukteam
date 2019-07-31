<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalHistoryStudentTable extends Migration
{
    public function up()
    {
        Schema::create('medical_history_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medical_history_id');
            $table->integer('medical_information_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_history_information');
    }
}
