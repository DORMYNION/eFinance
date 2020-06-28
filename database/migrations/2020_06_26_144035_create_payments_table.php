<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_method');
            $table->decimal('amount', 15, 2);
            $table->date('paid_at');
            $table->string('transaction');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
