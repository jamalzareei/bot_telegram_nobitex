<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('answer')->nullable();
            $table->timestamp('actived_at')->nullable();
            $table->string('chant_id')->nullable();
            $table->biginteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('keyborad_telegrams', function (Blueprint $table) {
            $table->integer('orderby')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}
