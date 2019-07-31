<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildhoodDiseasesTable extends Migration
{
    public function up()
    {
        Schema::create('childhood_diseases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->integer('school_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('childhood_diseases');
    }
}
