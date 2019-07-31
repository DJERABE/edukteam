<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('slogan')->nullable();
            $table->string('siteweb')->nullable();
            $table->string('contact_1');
            $table->string('contact_2')->nullable();
            $table->string('email')->unique();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('adresse');
            $table->integer('ville_id');
            $table->integer('pays_id');
            $table->string('nom_banque')->nullable();
            $table->string('nom_compte_banque')->nullable();
            $table->string('numero_compte_banque')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
