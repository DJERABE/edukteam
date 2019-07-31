<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guardian_type_id');
            $table->string('last_name');
            $table->string('given_names');
            $table->string('career');
            $table->string('employer');
            $table->string('mailing_address');
            $table->string('tel_work');
            $table->string('tel_home');
            $table->string('cell');
            $table->string('email', 191)->unique();
            $table->longText('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guardians');
    }
}
