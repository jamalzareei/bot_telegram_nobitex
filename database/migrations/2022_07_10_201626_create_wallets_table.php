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
            $table->biginteger('pay_id')->nullable();
            $table->biginteger('status_id')->nullable(); // 
            $table->biginteger('type_id')->nullable(); // 
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
