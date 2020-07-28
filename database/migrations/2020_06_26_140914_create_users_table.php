<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('bvn')->unique();
            $table->string('title');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('name')->nullable();
            $table->string('gender');
            $table->string('marital_status');
            $table->date('date_of_birth');
            $table->string('mobile_no_1');
            $table->string('mobile_no_2')->nullable();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('land_mark');
            $table->string('local_government_area_of_residence');
            $table->string('state_of_residence');
            $table->string('status_of_residence');
            $table->string('employment_sector');
            $table->string('employers_name');
            $table->string('employers_address');
            $table->string('employers_land_mark');
            $table->string('employers_local_government_area');
            $table->string('employers_state');
            $table->decimal('monthly_income', 15, 2);
            $table->string('bank_name');
            $table->string('account_no')->unique();
            $table->string('account_name');
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('verification_token')->nullable();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
