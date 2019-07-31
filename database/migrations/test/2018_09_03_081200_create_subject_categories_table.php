<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('subject_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('school_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subject_categories');
    }
}
