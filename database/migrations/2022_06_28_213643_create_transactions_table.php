<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            
            $table->string('type')->nullable(); // buy or sell
            $table->unsignedDecimal('discount', $precision = 20, $scale = 2);
            $table->unsignedBigInteger('discount_id')->nullable(); // buy or sell
            $table->unsignedDecimal('amount', $precision = 20, $scale = 2);
            $table->nullableMorphs('transactionable');

            $table->unsignedBigInteger('status_id');
            // $table->foreign('status_id')->references('id')->on('statuses');

            $table->timestamp("actived_at")->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
