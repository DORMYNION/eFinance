<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomerDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('customer_documents', function (Blueprint $table) {
            $table->unsignedInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_1710728')->references('id')->on('customers');
        });
    }
}
