<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->unsignedBigInteger('disbursed_by_id')->nullable();
            $table->decimal('loan_amount', 15, 2);
            $table->string('status')->default('Pending')->nullable();
            $table->string('decline_reason')->nullable();
            $table->string('loan_exist')->default('No')->nullable();
            $table->string('loan_exist_type')->nullable();
            $table->decimal('loan_exist_amount', 15, 2)->nullable();
            $table->string('purpose_of_loan');
            $table->string('repayment_option');
            $table->integer('loan_duration');
            $table->decimal('interest', 15, 2);
            $table->decimal('total', 15, 2);
            $table->dateTime('approved_at')->nullable();            
            $table->dateTime('disbursed_at')->nullable();            
            $table->timestamps(); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('approved_by_id')->references('id')->on('users');
            $table->foreign('disbursed_by_id')->references('id')->on('users');
        });
    }
}
