<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->integer('bvn')->unique();
            $table->string('title');
            $table->string('last_name');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('mobile_no_1');
            $table->string('mobile_no_2')->nullable();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('land_mark');
            $table->string('state_of_residence');
            $table->string('local_government_area_of_residence');
            $table->string('status_of_residence');
            $table->decimal('monthly_income', 15, 2);
            $table->string('employment_sector');
            $table->string('employers_name');
            $table->string('employers_address');
            $table->string('employers_land_mark');
            $table->string('employers_state');
            $table->string('employers_local_government_area');
            $table->string('password')->nullable();
            $table->string('account_no')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('status')->nullable();
            $table->string('bank_name');
            $table->string('account_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
