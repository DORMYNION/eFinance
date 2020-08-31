<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanRepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_repayments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('loan_amount_id');
            $table->string('tenor');
            $table->decimal('amount', 15, 2);
            $table->dateTime('due_date');
            $table->string('status');
            $table->timestamps();
            $table->foreign('loan_id')->references('id')->on('loans');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('loan_amount_id')->references('id')->on('loan_amounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_repayments');
    }
}
