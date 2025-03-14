<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('estate_id');
            $table->unsignedInteger('plots');
            $table->unsignedInteger('affiliate_id')->nullable();
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('balance')->default(0);
            $table->string('payment_mode');
            $table->string('code')->unique();
            $table->boolean('completed');
            $table->longText('comments')->nullable();
            $table->dateTime('sold_at');
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
        Schema::dropIfExists('sales');
    }
}
