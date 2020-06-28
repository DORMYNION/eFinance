<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanAmountsTable extends Migration
{
    public function up()
    {
        Schema::create('loan_amounts', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('sub_total', 15, 2);
            $table->decimal('interest', 15, 2);
            $table->decimal('total', 15, 2);
            $table->decimal('paid', 15, 2)->nullable();
            $table->decimal('balance', 15, 2)->nullable();
            $table->date('loan_date');
            $table->date('due_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
