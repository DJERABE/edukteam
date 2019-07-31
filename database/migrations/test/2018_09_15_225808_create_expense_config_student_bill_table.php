<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseConfigStudentBillTable extends Migration
{
    public function up()
    {
        Schema::create('expense_config_student_bill', function (Blueprint $table) {
            $table->integer('expense_config_id');
            $table->integer('student_bill_id');
            $table->double('unitaire');
            $table->integer('quantite');
            $table->double('remise');
            $table->double('montant_attendu');
            $table->double('montant_paye');
            $table->double('montant_restant');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expense_config_student_bill');
    }
}
