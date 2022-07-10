<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedDecimal('amount', $precision = 20, $scale = 2);
            $table->text('details')->nullable();
            $table->nullableMorphs('walletable');//->nullable();
            $table->text('pay_id')->nullable();
            $table->text('status_id')->nullable(); // 
            $table->text('type')->nullable(); // variz ya bardash (deposit harvest)
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
        Schema::dropIfExists('wallets');
    }
}
