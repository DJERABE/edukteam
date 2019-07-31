<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNiveauxDEtudesTables extends Migration
{
    public function up()
    {
        Schema::create('niveaux_etudes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('school_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('niveaux_etudes');
    }
}
