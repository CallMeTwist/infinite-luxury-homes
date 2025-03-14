<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('surname');
            $table->string('first_name');
            $table->string('other_names');
            $table->string('marital_status')->nullable();
            $table->text('address');
            $table->date('birthday');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('state_id');
            $table->string('lga');
            $table->string('gender');
            $table->string('occupation');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('nok_surname')->nullable();
            $table->string('nok_other_names')->nullable();
            $table->text('nok_address')->nullable();
            $table->string('nok_gender')->nullable();
            $table->string('nok_occupation')->nullable();
            $table->string('nok_phone')->nullable();
            $table->unsignedInteger('affiliate_id')->nullable();
            $table->string('code')->unique();
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('clients');
    }
}
