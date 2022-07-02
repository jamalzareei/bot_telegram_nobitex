<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeyboradTelegramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keyborad_telegrams', function (Blueprint $table) {
            $table->id();
            $table->string("text");
            $table->bigInteger("parent_id")->nullable();
            $table->string("parent_callback_data")->nullable(); // parnet
            $table->string("next_callback_data")->nullable(); // parnet
            $table->bigInteger("next_id")->nullable(); // parnet
            $table->string("type")->nullable(); // text, keyboard, inline_keyboard
            $table->string("url")->nullable(); //  for btn link
            $table->string("callback_data")->nullable(); // text or callback_data (slug)
            $table->string("children_type")->nullable();  // text, keyboard, inline_keyboard (array)
            $table->text("details")->nullable(); // text for show (html)
            $table->string("controller_method")->nullable(); // Path/NameController@methodName
            $table->integer("status")->nullable();
            $table->integer("chunk_children")->nullable();
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
        Schema::dropIfExists('keyborad_telegrams');
    }
}
