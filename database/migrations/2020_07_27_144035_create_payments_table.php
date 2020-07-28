<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loan_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('loan_amount_id');
            $table->string('payment_method');
            $table->string('payment_type');
            $table->decimal('amount', 15, 2);
            $table->date('paid_at');
            $table->string('reference');
            $table->string('status');
            $table->timestamps();
            $table->foreign('loan_id')->references('id')->on('loans');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('loan_amount_id')->references('id')->on('loan_amounts');
        });
    }
}