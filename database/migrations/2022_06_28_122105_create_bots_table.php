<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id')->nullable();
            // $table->foreign('type_id')->references('id')->on('types');

            $table->string('chat_id'); // telegram chat id...
            $table->text('message');
            $table->string('message_id');
            $table->string('file_id')->nullable();
            $table->string('next_answer')->nullable();
            $table->string('callback_data')->nullable();
            $table->string('parent_chat')->nullable();
            $table->string('controller_method')->nullable();
            $table->string('controller_method_child')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('username')->nullable();
            $table->json('data');
            $table->text('session_data'); //  data recived
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
        Schema::dropIfExists('bots');
    }
}
