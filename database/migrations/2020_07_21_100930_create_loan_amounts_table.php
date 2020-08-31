<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanAmountsTable extends Migration
{
    public function up()
    {
        Schema::create('loan_amounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->decimal('loan_amount', 15, 2);
            $table->string('loan_tenor');
            $table->decimal('interest', 15, 2);
            $table->decimal('total', 15, 2);
            $table->decimal('paid', 15, 2)->nullable();
            $table->decimal('balance', 15, 2)->nullable();
            $table->string('repayment_option');
            $table->string('status');
            $table->dateTime('disbursed_date');
            $table->dateTIme('due_date')->nullable();
            $table->timestamps();
            $table->foreign('loan_id')->references('id')->on('loans');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}