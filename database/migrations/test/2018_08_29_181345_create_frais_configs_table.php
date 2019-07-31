<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFraisConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frais_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('annee_id')->unsigned();
            $table->integer('frais_id')->unsigned();
            $table->integer('classe_id')->unsigned();
            $table->integer('echeance_id')->unsigned();
            $table->double('montant')->unsigned();
            $table->boolean('frais_obligatoire')->default(0);
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
        Schema::dropIfExists('frais_configs');
    }
}
