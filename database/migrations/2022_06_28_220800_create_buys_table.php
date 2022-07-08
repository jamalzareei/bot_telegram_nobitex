<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('transaction_id')->nullable();
            // $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->unsignedBigInteger('currency_id')->nullable();
            // $table->foreign('currency_id')->references('id')->on('currencies');
            $table->unsignedBigInteger('status_id');
            // $table->foreign('status_id')->references('id')->on('statuses');
            $table->unsignedBigInteger('type_id');
            // $table->foreign('type_id')->references('id')->on('types');

            $table->unsignedBigInteger('request_amount');
            $table->unsignedDecimal('price', $precision = 20, $scale = 2);
            $table->unsignedDecimal('amount', $precision = 20, $scale = 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buys');
    }
}
