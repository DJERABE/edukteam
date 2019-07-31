<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->increments('id');
            $table->double('unitaire');
            $table->double('montant');
            $table->double('remise');
            $table->double('attendu');
            $table->integer('quantite');
            $table->boolean('obligatoire')->default(0);           
            $table->boolean('exclure')->default(0);           
            $table->integer('frais_configs_id')->unsigned();
            $table->integer('etudiant_id')->unsigned();
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
        Schema::dropIfExists('factures');
    }
}
