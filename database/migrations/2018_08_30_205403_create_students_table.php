<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->string('matricule');
            $table->string('last_name');
            $table->string('given_names');
            $table->datetime('dob');
            $table->string('place_birth')->nullable();
            $table->string('citizenship');

            $table->string('address');
            $table->softDeletes();
            //$table->string('county');
            //$table->string('district');
            //$table->string('street_no');
            $table->string('student_avatar')->nullable();

            $table->integer('familly_id')->unsigned();


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
