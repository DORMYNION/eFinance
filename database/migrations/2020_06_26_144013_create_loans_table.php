<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('viewed')->default(0)->nullable();
            $table->decimal('loan_amount', 15, 2);
            $table->string('status');
            $table->string('loan_exist');
            $table->string('loan_exist_type')->nullable();
            $table->decimal('loan_exist_amount', 15, 2)->nullable();
            $table->string('purpose_of_loan');
            $table->string('repayment_option');
            $table->integer('loan_duration');
            $table->decimal('interest', 15, 2);
            $table->decimal('total', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
