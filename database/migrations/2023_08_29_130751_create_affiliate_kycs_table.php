<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateKycsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_kycs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('affiliate_id');
            $table->string('state_of_origin');
            $table->string('lga_of_origin');
            $table->date('date_of_birth');
            $table->string('marital_status');
            $table->string('front_document');
            $table->string('back_document');
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('affiliate_kycs');
    }
}
