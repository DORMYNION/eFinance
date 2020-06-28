<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedInteger('loan_id');
            $table->foreign('loan_id', 'loan_fk_1715834')->references('id')->on('loans');
            $table->unsignedInteger('loan_amount_id');
            $table->foreign('loan_amount_id', 'loan_amount_fk_1715835')->references('id')->on('loan_amounts');
        });
    }
}
