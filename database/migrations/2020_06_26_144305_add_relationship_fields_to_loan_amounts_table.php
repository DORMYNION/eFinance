<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLoanAmountsTable extends Migration
{
    public function up()
    {
        Schema::table('loan_amounts', function (Blueprint $table) {
            $table->unsignedInteger('loan_id');
            $table->foreign('loan_id', 'loan_fk_1715630')->references('id')->on('loans');
        });
    }
}
