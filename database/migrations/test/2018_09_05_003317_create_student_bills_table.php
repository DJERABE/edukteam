<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentBillsTable extends Migration
{
    public function up()
    {
        Schema::create('student_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('academic_year_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->double('montant_total_attendu');
            $table->double('montant_total_paye');
            $table->double('montant_total_restant');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_bills');
    }
}
