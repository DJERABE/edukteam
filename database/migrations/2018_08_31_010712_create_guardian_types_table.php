<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardianTypesTable extends Migration
{
    public function up()
    {
        Schema::create('guardian_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guardian_types');
    }
}
