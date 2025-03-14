<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->boolean('approved')->default(false);
            $table->unsignedInteger('referrer_id')->nullable();
            $table->unsignedInteger('balance')->default(0);
            $table->string('payment_proof')->nullable();
            $table->string('code')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('affiliates');
    }
}
