<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->nullableMorphs('payable');//->nullable();
            $table->unsignedDecimal('amount', $precision = 20, $scale = 2);
            $table->unsignedDecimal('discount', $precision = 20, $scale = 2);
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->string('bank_portal')->nullable();
            $table->text('details')->nullable();
            $table->string('tracking_code')->nullable(); // shomare paygiri
            $table->string('trans_id')->nullable(); // nextpay
            $table->string('api_key')->nullable(); // nextpay
            $table->string('order_id')->nullable(); // nextpay
            $table->string('code_token')->nullable(); // nextpay
            $table->string('code_verify')->nullable(); // nextpay
            $table->string('cart_number')->nullable(); //  somare cart pardakht konande nextpay
            $table->string('customer_phone')->nullable(); // somare telephon pardakht konande nextpay
            
            $table->text('status_id')->nullable(); // 
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
        Schema::dropIfExists('pays');
    }
}
