<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseConfigurationsTable extends Migration
{
    public function up()
    {
        Schema::create('expense_configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('academic_year_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('expense_id')->unsigned();
            $table->double('amount')->unsigned();
            $table->boolean('is_required')->default(0);
            $table->integer('echeance_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expense_configurations');
    }
}
