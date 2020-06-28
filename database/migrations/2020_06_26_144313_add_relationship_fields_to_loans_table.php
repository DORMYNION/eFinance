<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLoansTable extends Migration
{
    public function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id', 'customer_fk_1711682')->references('id')->on('customers');
        });
    }
}
